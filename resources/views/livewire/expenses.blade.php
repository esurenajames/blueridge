<div>
    <h2 class="text-3xl pt-6 pl-6 font-bold mb-2">Summary of Income and Expenditure 2024</h2>

    <div class="overflow-x-auto">
        <div class="flex justify-end mb-4">
            <button wire:click="$set('editingExpense', new App\Models\Expense())" class="px-6 py-2.5 min-w-[150px] rounded text-white text-sm font-semibold border-none outline-none bg-[#333] hover:bg-[#222]">Add Row</button>
        </div>
        <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="py-2 px-4 border-r text-left text-gray-600 font-medium whitespace-nowrap">Object of Expenditure</th>
                    <th class="py-2 px-4 text-left text-gray-600 font-medium whitespace-nowrap">Proposed Budget</th>
                    <!-- Add headers for each month and other columns as needed -->
                    <th class="py-2 px-4 border-r text-left text-gray-600 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($expenses as $expense)
                    <tr>
                        <td class="py-3 px-4 border-r">{{ $expense->object_of_expenditure }}</td>
                        <td class="py-3 px-4">{{ $expense->proposed_budget }}</td>
                        <!-- Add cells for each month and other columns as needed -->
                        <td class="py-3 px-4 flex justify-start ">
                            <button wire:click="edit({{ $expense->id }})" class="mr-4" title="Edit">Edit</button>
                            <button wire:click="delete({{ $expense->id }})" class="mr-1" title="Delete">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div x-data="{ showModal: @entangle('editingExpense.id').defer }" x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold mb-4">Edit Expense</h2>
            <form wire:submit.prevent="save">
                <div class="mb-4">
                    <label for="object_of_expenditure" class="block text-gray-700">Object of Expenditure</label>
                    <input type="text" wire:model="editingExpense.object_of_expenditure" id="object_of_expenditure" class="w-full px-4 py-2 border rounded-lg">
                    @error('editingExpense.object_of_expenditure') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="proposed_budget" class="block text-gray-700">Proposed Budget</label>
                    <input type="number" wire:model="editingExpense.proposed_budget" id="proposed_budget" class="w-full px-4 py-2 border rounded-lg">
                    @error('editingExpense.proposed_budget') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <!-- Add inputs for each month and other fields as needed -->
                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2.5 min-w-[150px] rounded text-white text-sm font-semibold border-none outline-none bg-[#333] hover:bg-[#222]">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
