<div class="">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transaction
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-8">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 text-gray-900">Transactions</h1>
                                <p class="mt-2 text-sm text-gray-700">Lorem, ipsum dolor sit amet consectetur
                                    adipisicing elit. Eveniet odio nesciunt nulla debitis architecto.</p>
                            </div>
                            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none flex gap-3">
                                <div class="">
                                    <input wire:model="search" type="text" name="search" id="search"
                                        placeholder="Search transaction " autocomplete="family-name"
                                        class="text-sm block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>


                            </div>
                        </div>
                        <div class="mt-8 flow-root mb-3">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                                    Transaction ID</th>
                                                <th scope="col"
                                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Reference Number</th>
                                                <th scope="col"
                                                    class="whitespace-nowrap text-right px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Price</th>
                                                <th scope="col"
                                                    class="whitespace-nowrap text-right px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Quantity</th>
                                                <th scope="col"
                                                    class="whitespace-nowrap text-right px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Payment Amount</th>
                                                <th scope="col"
                                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Product</th>
                                                <th scope="col"
                                                    class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-0">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            @forelse ($transactions as $transaction)
                                                <tr>
                                                    <td
                                                        class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-0">
                                                        {{ $transaction->id }}</td>
                                                    <td
                                                        class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                                        {{ $transaction->reference_no }}</td>
                                                    <td
                                                        class="whitespace-nowrap text-right px-2 py-2 text-sm font-medium text-gray-900">
                                                        {{ number_format($transaction->price,0,2) }}</td>
                                                    <td
                                                        class="whitespace-nowrap text-right px-2 py-2 text-sm font-medium text-gray-900">
                                                        {{ number_format($transaction->quantity,0,2) }}</td>
                                                    <td
                                                        class="whitespace-nowrap text-right px-2 py-2 text-sm font-medium text-gray-900">
                                                        {{ number_format($transaction->payment_amount,0,2) }}</td>
                                                    <td
                                                        class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                                        <a class="text-indigo-600 hover:font-bold"
                                                            href="{{ route('product.detail', ['product' => $transaction->product->id]) }}">

                                                            {{ $transaction->product->id }} |
                                                            {{ $transaction->product->name }}
                                                        </a>
                                                    </td>

                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="whitespace-nowrap px-2 py-2 text-center text-gray-500"
                                                        colspan="7">
                                                        There is no data
                                                    </td>
                                                </tr>
                                            @endforelse


                                            <!-- More transactions... -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{ $transactions->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
