<div id="input-container ">
    <div class="flex justify-between input-set">
        <div class="md:col-span-1 md:flex-grow">
            <label class="block font-bold text-sm">Unit</label>
            <input type="text" class="w-40 border border-gray-300 p-2 h-8" name="unit[]" value="0" required>
        </div>
        <div class="md:col-span-1 md:flex-grow">
            <label class="block font-bold text-sm">Item Description</label>
            <input type="text" class="w-52 border border-gray-300 p-2 h-8" name="itemDescription[]" value="0" required>
        </div>
        <div class="md:col-span-1 md:flex-grow">
            <label class="block font-bold text-sm">Quantity</label>
            <input type="number" class="w-10 border border-gray-300 p-2 h-8" name="quantity[]" value="0" required>
        </div>
        <div class="md:col-span-1 md:flex-grow">
            <label class="block font-bold text-sm">Estimated Unit Cost</label>
            <input type="number" class="w-32 border border-gray-300 p-2 h-8" name="estimatedUnitCost[]" value="0" required>
        </div>
        <div class="flex items-center md:w-auto mt-5 justify-center">
            <button type="button" class="remove-btn bg-red-700 hover:bg-red-900 text-white rounded w-50 h-8 px-2">
                <span class="bi bi-trash">&nbsp;&nbsp;DELETE INPUT</span>
            </button>
        </div>
    </div>

</div>