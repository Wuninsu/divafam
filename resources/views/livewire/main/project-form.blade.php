<div>

    <div class="">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#!">Projects</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
        <h2 class="mb-4">Create a project</h2>
        <div class="row">
            <div class="col-xl-9">
                <form class="row g-3 mb-6">
                    <div class="col-sm-6 col-md-8">
                        <div class="form-floating"><input class="form-control" id="floatingInputGrid" type="text"
                                placeholder="Project title"><label for="floatingInputGrid">Project title</label></div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-floating"><select class="form-select" id="floatingSelectTask">
                                <option selected="selected">Select task view</option>
                                <option value="1">technical</option>
                                <option value="2">external</option>
                                <option value="3">organizational</option>
                            </select><label for="floatingSelectTask">Defult task view</label></div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-floating"><select class="form-select" id="floatingSelectPrivacy">
                                <option selected="selected">Select privacy</option>
                                <option value="1">Data Privacy One</option>
                                <option value="2">Data Privacy Two</option>
                                <option value="3">Data Privacy Three</option>
                            </select><label for="floatingSelectPrivacy">Project privacy</label></div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-floating"><select class="form-select" id="floatingSelectTeam">
                                <option selected="selected">Select team</option>
                                <option value="1">Team One</option>
                                <option value="2">Team Two</option>
                                <option value="3">Team Three</option>
                            </select><label for="floatingSelectTeam">Team </label></div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-floating"><select class="form-select" id="floatingSelectAssignees">
                                <option selected="selected">Select assignees </option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select><label for="floatingSelectAssignees">People </label></div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-floating"><select class="form-select" id="floatingSelectAdmin">
                                <option selected="selected">Select admin</option>
                                <option value="1">Data Privacy One</option>
                                <option value="2">Data Privacy Two</option>
                                <option value="3">Data Privacy Three</option>
                            </select><label for="floatingSelectAdmin">Project Lead</label></div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="flatpickr-input-container">
                            <div class="form-floating"><input class="form-control datetimepicker flatpickr-input"
                                    id="floatingInputStartDate" type="text" placeholder="end date"
                                    data-options="{&quot;disableMobile&quot;:true}" readonly="readonly"><label
                                    class="ps-6" for="floatingInputStartDate">Start date</label><span
                                    class="uil uil-calendar-alt flatpickr-icon text-body-tertiary"></span></div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="flatpickr-input-container">
                            <div class="form-floating"><input class="form-control datetimepicker flatpickr-input"
                                    id="floatingInputDeadline" type="text" placeholder="deadline"
                                    data-options="{&quot;disableMobile&quot;:true}" readonly="readonly"><label
                                    class="ps-6" for="floatingInputDeadline">Deadline</label><span
                                    class="uil uil-calendar-alt flatpickr-icon text-body-tertiary"></span></div>
                        </div>
                    </div>
                    <div class="col-12 gy-6">
                        <div class="form-floating">
                            <textarea class="form-control" id="floatingProjectOverview"
                                placeholder="Leave a comment here" style="height: 100px"></textarea><label
                                for="floatingProjectOverview">project overview</label>
                        </div>
                    </div>
                    <div class="col-md-6 gy-6">
                        <div class="form-floating"><select class="form-select" id="floatingSelectClient">
                                <option selected="selected">Select client</option>
                                <option value="1">Client One</option>
                                <option value="2">Client Two</option>
                                <option value="3">Client Three</option>
                            </select><label for="floatingSelectClient">client</label></div>
                    </div>
                    <div class="col-md-6 gy-md-6">
                        <div class="form-floating"><input class="form-control" id="floatingInputBudget" type="text"
                                placeholder="Budget"><label for="floatingInputBudget">Budget</label>
                        </div>
                    </div>
                    <div class="col-12 gy-6">
                        <div class="form-floating form-floating-advance-select"><label>Add tags</label>
                            <div class="choices" data-type="select-multiple" role="combobox" aria-autocomplete="list"
                                aria-haspopup="true" aria-expanded="false">
                                <div class="choices__inner"><select class="form-select choices__input"
                                        id="organizerMultiple" data-choices="data-choices" multiple="multiple"
                                        data-options="{&quot;removeItemButton&quot;:true,&quot;placeholder&quot;:true}"
                                        hidden="" tabindex="-1" data-choice="active">
                                        <option selected="">Stupidity</option>
                                        <option>Jerry</option>
                                        <option>Not_the_mouse</option>
                                        <option>Rick</option>
                                        <option>Biology</option>
                                        <option>Neurology</option>
                                        <option>Brainlessness</option>
                                    </select>
                                    <div class="choices__list choices__list--multiple" role="listbox">
                                        <div class="choices__item choices__item--selectable" data-item="" data-id="1"
                                            data-value="Stupidity" aria-selected="true" role="option" data-deletable="">
                                            Stupidity<button type="button" class="choices__button"
                                                aria-label="Remove item: Stupidity" data-button="">Remove
                                                item</button>
                                        </div>
                                    </div><input type="search" class="choices__input choices__input--cloned"
                                        autocomplete="off" autocapitalize="none" spellcheck="false"
                                        aria-autocomplete="list" style="min-width: 1ch; width: 1ch;">
                                </div>
                                <div class="choices__list choices__list--dropdown" aria-expanded="false">
                                    <div class="choices__list" aria-multiselectable="true" role="listbox">
                                        <div id="choices--organizerMultiple-item-choice-5"
                                            class="choices__item choices__item--choice choices__item--selectable is-highlighted"
                                            role="option" data-choice="" data-id="5" data-value="Biology"
                                            data-choice-selectable="" aria-selected="true">Biology</div>
                                        <div id="choices--organizerMultiple-item-choice-7"
                                            class="choices__item choices__item--choice choices__item--selectable"
                                            role="option" data-choice="" data-id="7" data-value="Brainlessness"
                                            data-choice-selectable="">Brainlessness</div>
                                        <div id="choices--organizerMultiple-item-choice-2"
                                            class="choices__item choices__item--choice choices__item--selectable"
                                            role="option" data-choice="" data-id="2" data-value="Jerry"
                                            data-choice-selectable="">Jerry</div>
                                        <div id="choices--organizerMultiple-item-choice-6"
                                            class="choices__item choices__item--choice choices__item--selectable"
                                            role="option" data-choice="" data-id="6" data-value="Neurology"
                                            data-choice-selectable="">Neurology</div>
                                        <div id="choices--organizerMultiple-item-choice-3"
                                            class="choices__item choices__item--choice choices__item--selectable"
                                            role="option" data-choice="" data-id="3" data-value="Not_the_mouse"
                                            data-choice-selectable="">Not_the_mouse</div>
                                        <div id="choices--organizerMultiple-item-choice-4"
                                            class="choices__item choices__item--choice choices__item--selectable"
                                            role="option" data-choice="" data-id="4" data-value="Rick"
                                            data-choice-selectable="">Rick</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div id="body" class="summernote">summernote 1</div>
                    </div>
                    <div class="col-12 gy-6">
                        <div class="row g-3 justify-content-end">
                            <div class="col-auto"><button class="btn btn-phoenix-primary px-5">Cancel</button></div>
                            <div class="col-auto"><button class="btn btn-primary px-5 px-sm-15">Create
                                    Project</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>