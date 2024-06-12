<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>



<div class="container-add-button">
    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" id="add-coach-btn">
        Add Coach
    </button>
    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">

            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Add Coach Information
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <form class="coach-info-form p-4 md:p-5" action="{{ route('coach.store') }}" method="POST" enctype="multipart/form-data" id="coach-info-form">
                    @csrf
                    <div class="container-create-links">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Enter the name of player.">
                    </div>
                    <div class="container-create-links">
                        <label for="club">Club</label>
                        <input type="text" name="club" placeholder="Enter the name of club.">
                    </div>
                    <div class="container-create-links">
                        <label for="country">Country</label>
                        <input type="text" name="country" placeholder="Enter the name of country.">
                    </div>
                    <div class="container-create-links">
                        <label for="is_retired">Is Retired</label>
                        <Select name="is_retired">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </Select>
                    </div>
                    <div class="container-create-links">
                        <label for="">Image</label>
                        <input type="file" name="image">
                    </div>
                    <div class="container-create-links">
                        <label for="">Trophy Number</label>
                        <input type="number" value="" name="trophy_number">
                    </div>

                    <button type="submit" class="btn-submit" data-modal-hide="crud-modal" style="margin:0px 35px 35px 35px; background:blue;">Submit</button>

                </form>
            </div>
        </div>
    </div>

</div>
