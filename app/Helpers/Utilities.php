<?php
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
if (!function_exists('generateUsername')) {
    function generateUsername($name)
    {
        // Step 1: Clean the name (remove spaces, make it lowercase)
        $baseUsername = strtolower(str_replace(' ', '', $name));  // Remove spaces and make lowercase

        // Step 2: Shorten the username to the first 6 characters of the cleaned name
        $baseUsername = substr($baseUsername, 0, 6);  // Limit to first 6 characters

        // Step 3: Generate random numbers and letters
        $randomNumber = rand(100, 9999);  // Random 3 to 4 digit number
        $randomChar = chr(rand(97, 122)); // Random lowercase letter (a-z)

        // Step 4: Create the base username
        $username = $baseUsername . $randomNumber . $randomChar;

        // Step 5: Ensure the username is unique
        // Check if the username already exists in the database
        while (User::where('username', $username)->exists()) {
            // If the username exists, regenerate the random part and try again
            $randomNumber = rand(100, 9999);  // New random 3 to 4 digit number
            $randomChar = chr(rand(97, 122)); // New random lowercase letter
            $username = $baseUsername . $randomNumber . $randomChar;
        }

        return $username;
    }
}
// if (!function_exists('unreadNotificationsCount')) {
//     function unreadNotificationsCount(): int
//     {
//         $user = Auth::user();

//         if (!$user) {
//             return 0; // if no logged-in user
//         }

//         return $user->unreadNotifications()->count();
//     }
// }


function get_total_users(string $role)
{
    $totalUsers = 25000;
    return intWithStyle($totalUsers);
}


if (!function_exists('setting_data')) {
    function setup_data($key): ?string
    {
        $setup = \App\Models\Setting::settingData();
        return $setup[$key] ?? '';
    }
}
// if (!function_exists('generate_sms_message')) {
//     /**
//      * Generate an SMS message from a template and replace placeholders.
//      *
//      * @param string $templateKey The key or identifier of the template.
//      * @param array $data The data to replace in the template.
//      * @return string|null The generated SMS message or null if template not found.
//      */
//     function generate_sms_message(string $templateKey, array $data): ?string
//     {
//         $template = \App\Models\SmsTemplate::where('name', $templateKey)->first();

//         if (!$template) {
//             return false;
//         }
//         $message = $template->template;

//         // Replace placeholders with data
//         foreach ($data as $key => $value) {
//             $message = str_replace("{{$key}}", $value, $message);
//         }

//         return $message;
//     }
// }


if (!function_exists('clearLivewireTemp')) {
    function clearLivewireTemp(): bool
    {
        try {
            $disk = Storage::disk('local'); // Livewire stores temp files on local disk
            $path = 'livewire-tmp';

            if ($disk->exists($path)) {
                $disk->deleteDirectory($path);
                $disk->makeDirectory($path); // recreate empty folder
            }

            return true;
        } catch (\Exception $e) {
            Log::error('Failed to clear Livewire temp: ' . $e->getMessage());
            return false;
        }
    }
}

function uploadFile($file, $directory = 'uploads', $customName = null)
{
    // Ensure directory exists
    if (!Storage::disk('public')->exists($directory)) {
        Storage::disk('public')->makeDirectory($directory);
    }

    // Generate a unique name if a custom name isn't provided
    $extension = $file->getClientOriginalExtension();
    $filename = $customName
        ? Str::slug($customName) . '.' . $extension
        : Str::uuid()->toString() . '.' . $extension;

    // Upload the file to the public disk
    $path = $file->storeAs($directory, $filename, 'public');

    // clearLivewireTemp();
    // Return the public URL
    return Storage::url($path); // e.g., /storage/uploads/abc.jpg

}


/**
 * Delete an image from storage and database.
 *
 * @param string $imagePath
 * @param object $imageModel
 * @return bool
 */
function deleteImage($imageModel, $column): bool
{
    // Ensure the image path is valid
    if ($imageModel->$column) {
        // Get the file path, and remove '/storage/' to get the relative path
        $filePath = str_replace('/storage/', '', $imageModel->$column);

        // Check if the file exists on the public disk
        if (Storage::disk('public')->exists($filePath)) {
            try {
                // Delete the image from storage
                Storage::disk('public')->delete($filePath);

                // Log successful deletion
                Log::info('Deleted image: ' . $imageModel->$column);
            } catch (\Exception $e) {
                // Handle error and log
                Log::error('Error deleting image: ' . $e->getMessage());
                return false;
            }
        } else {
            // Log if file doesn't exist
            Log::warning('File not found for deletion: ' . $imageModel->$column);
            return false;
        }
    }

    return true;
}


if (!function_exists('paginationLimit')) {
    function paginationLimit()
    {
        $settings = Setting::settingData();
        return $settings['pagination_limit'] ?? 7;
    }
}

if (!function_exists('intWithStyle')) {
    /**
     * Style the number value with a suffix like 10M, 10K, 10.3B, etc.
     */
    function intWithStyle($n)
    {
        if ($n < 1000)
            return $n;

        $suffix = ['', 'K', 'M', 'B', 'T', 'P', 'E', 'Z', 'Y'];
        $power = floor(log($n, 1000));
        $divided = $n / (1000 ** $power);
        $formatted = floor($divided * 10) / 10; // keep one decimal without rounding up

        return $formatted . $suffix[$power];
    }
}

if (!function_exists('sendSMS')) {
    /**
     * Summary of sendSMS
     * @param array $data
     * @return bool
     */
    function sendSMS($data): bool
    {
        // Define parameters
        $api_key = "cnVOcm52bW1FYWdOQWZ0Ykx3aUY";
        $from = "JITDelivery";
        $to = $data['to']; // Recipient's phone number
        $msg = urlencode($data['message']); // Encode the message

        // Initialize cURL request
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://sms.arkesel.com/sms/api?action=send-sms&api_key=$api_key&to=$to&from=$from&sms=$msg",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        // Execute cURL request
        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            // Handle cURL error
            $error_msg = curl_error($curl);
            curl_close($curl);
            // Log or handle the error message
            return false;
        }
        curl_close($curl);

        // Handle the API response
        if ($response) {
            $result = trim($response, '[]');
            $sms_res = json_decode($result);

            if ($sms_res && isset($sms_res->code) && $sms_res->code == 'ok') {
                return true; // SMS sent successfully
            }
        }

        // Default failure case
        return false;
    }
}

