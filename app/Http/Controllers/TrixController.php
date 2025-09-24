<?php

namespace App\Http\Controllers;

use App\Models\TrixPost;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class TrixController extends Controller
{

    public function index()
    {
        $posts = TrixPost::all(); // Retrieve all posts from the database
        return view('summernote', compact('posts'));
    }


    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:posts,slug|max:255',
            'body' => 'required|string',
        ]);

        // Get the body content from the request
        $body = $request->body;

        // Define the path where the images will be stored
        $imagePath = 'projects/';

        // Check if the directory exists, and create it if not
        if (!Storage::exists($imagePath)) {
            Storage::makeDirectory($imagePath);  // Create the directory if it doesn't exist
        }

        // Create a DOMDocument instance to manipulate the HTML content
        $dom = new DOMDocument();
        @$dom->loadHTML($body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);  // Suppress warnings

        // Get all the image elements
        $images = $dom->getElementsByTagName('img');

        // Loop through the images and process base64 encoded images
        foreach ($images as $key => $img) {
            // Get the 'src' attribute (which could be base64 or a URL)
            $src = $img->getAttribute('src');

            // Check if the src attribute contains base64 encoded image data
            if (strpos($src, 'data:image') === 0) {
                // Process base64 image
                $data = base64_decode(explode(',', $src)[1]);
                $imageName = Str::uuid() . '.png';

                // Store the image in the public disk
                Storage::disk('public')->put($imagePath . $imageName, $data);

                // Update the src attribute to point to the correct public URL
                $img->removeAttribute('src');
                $img->setAttribute('src', Storage::url($imagePath . $imageName));
            } elseif (filter_var($src, FILTER_VALIDATE_URL)) {
                // Handle external image URL (optional)
                continue; // Skip external URLs or handle separately
            }
        }

        // Save the modified body with updated image URLs
        $body = $dom->saveHTML();

        // Create the new post with the updated body (which includes the image URLs)
        TrixPost::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $body,
        ]);

        // Redirect or return a success response
        return redirect()->route('trix.index')->with('success', 'Post created successfully.');
    }


    // public function store(Request $request)
    // {
    //     // Validate the incoming data
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'slug' => 'required|string|unique:posts,slug|max:255',
    //         'body' => 'required|string',
    //     ]);

    //     // Get the body content from the request
    //     $body = $request->body;

    //     // Define the path where the images will be stored
    //     $imagePath = 'public/projects/';

    //     // Check if the directory exists, and create it if not
    //     if (!Storage::exists($imagePath)) {
    //         Storage::makeDirectory($imagePath);  // Create the directory if it doesn't exist
    //     }

    //     // Create a DOMDocument instance to manipulate the HTML content
    //     $dom = new DOMDocument();
    //     $dom->loadHTML($body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

    //     // Get all the image elements
    //     $images = $dom->getElementsByTagName('img');

    //     // Loop through the images and process base64 encoded images
    //     foreach ($images as $key => $img) {
    //         // Get the 'src' attribute (which could be base64 or a URL)
    //         $src = $img->getAttribute('src');

    //         // Check if the src attribute contains base64 encoded image data
    //         if (strpos($src, 'data:image') === 0) {
    //             // Extract the base64 encoded string from the src attribute
    //             $data = base64_decode(explode(',', explode(';', $src)[1])[1]);

    //             // Generate a unique image name
    //             $imageName = time() . $key . '.png';

    //             // Store the image in the storage directory (public disk)
    //             $path = Storage::put($imagePath . $imageName, $data);

    //             // Update the src attribute to point to the correct public URL
    //             $img->removeAttribute('src');
    //             $img->setAttribute('src', Storage::url('projects/' . $imageName));
    //         }
    //     }

    //     // Save the modified body with updated image URLs
    //     $body = $dom->saveHTML();

    //     // Create the new post with the updated body (which includes the image URLs)
    //     TrixPost::create([
    //         'title' => $request->title,
    //         'slug' => $request->slug,
    //         'body' => $body,
    //     ]);

    //     // Redirect or return a success response
    //     return redirect()->route('trix.index')->with('success', 'Post created successfully.');
    // }

    public function upload(Request $request)
    {


        $file = $request->file('file');

        if ($file) {
            // dd('FILE DETECTED');  // Check if file is detected
            $path = $file->store('uploads', 'public');
            return response()->json(['url' => asset('storage/' . $path)]);
        }

        dd('no file');  // Debugging if file is not present
    }

    public function show($id)
    {
        $post = TrixPost::findOrFail($id); // Find post by ID
        return view('trix-show', compact('post'));
    }

    public function edit($id)
    {
        $post = TrixPost::findOrFail($id); // Find post by ID
        return view('trix-edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:posts,slug,' . $id . '|max:255',
            'body' => 'required|string',
        ]);

        // Find the existing post by ID
        $post = TrixPost::findOrFail($id);

        // Get the body content from the request
        $body = $request->body;

        // Define the path where the images will be stored
        $imagePath = 'projects/';

        // Check if the directory exists, and create it if not
        if (!Storage::exists($imagePath)) {
            Storage::makeDirectory($imagePath);  // Create the directory if it doesn't exist
        }

        // Create a DOMDocument instance to manipulate the HTML content
        $dom = new DOMDocument();
        @$dom->loadHTML($body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);  // Suppress warnings

        // Get all the image elements
        $images = $dom->getElementsByTagName('img');

        // Loop through the images and process base64 encoded images
        foreach ($images as $key => $img) {
            // Get the 'src' attribute (which could be base64 or a URL)
            $src = $img->getAttribute('src');

            // Check if the src attribute contains base64 encoded image data
            if (strpos($src, 'data:image') === 0) {
                // Process base64 image
                $data = base64_decode(explode(',', $src)[1]);
                $imageName = Str::uuid() . '.png';

                // Store the image in the public disk
                Storage::disk('public')->put($imagePath . $imageName, $data);

                // Update the src attribute to point to the correct public URL
                $img->removeAttribute('src');
                $img->setAttribute('src', Storage::url($imagePath . $imageName));
            } elseif (filter_var($src, FILTER_VALIDATE_URL)) {
                // Handle external image URL (optional)
                continue; // Skip external URLs or handle separately
            }
        }

        // Save the modified body with updated image URLs
        $body = $dom->saveHTML();

        // Update the post with the new data
        $post->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $body,
        ]);

        // Redirect or return a success response
        return redirect()->route('trix.show', $post->id)->with('success', 'Post updated successfully.');
    }


    public function destroy($id)
    {
        // Find the post by ID
        $post = TrixPost::findOrFail($id);

        // Use DOMDocument to parse the body and extract image sources
        $dom = new DOMDocument();
        @$dom->loadHTML($post->body, 9);

        // Get all image elements from the body
        $images = $dom->getElementsByTagName('img');

        // Loop through the images and delete the files from storage
        foreach ($images as $img) {
            $src = $img->getAttribute('src');

            // Delete the image if it exists
            if (File::exists($src)) {
                File::delete($src); // Deletes the image file
            }
        }

        // Delete the post from the database
        $post->delete();

        // Redirect back with a success message
        return redirect()->route('trix.index')->with('success', 'Post and related images deleted successfully.');
    }



    // public function upload(Request $request)
    // {
    //     if ($request->hasFile('file')) {
    //         //get filename with extension
    //         $filenamewithextension = $request->file('file')->getClientOriginalName();

    //         //get filename without extension
    //         $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

    //         //get file extension
    //         $extension = $request->file('file')->getClientOriginalExtension();

    //         //filename to store
    //         $filenametostore = $filename . '_' . time() . '.' . $extension;

    //         //Upload File
    //         $request->file('file')->move(public_path('media'), $filenametostore);

    //         // you can save image path below in database
    //         $path = asset('media/' . $filenametostore);

    //         echo $path;
    //         exit;
    //     }
    // }
}
