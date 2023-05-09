<div class="">

    <x-slot name="header">
        <div class="flex justify-between">

            <h2 class="my-auto font-semibold text-xl text-gray-800 leading-tight">
                {{ $product->name }}
            </h2>
            @livewire('product.update', ['mode' => 'update', 'product' => $product], key($product->id))
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden border  sm:rounded-lg p-8">

                <div class="border-b pb-3">

                    <div class="text-2xl font-bold text-gray-700 mb-2">{{ $product->name }}</div>
                    <div class="text-sm text-gray-800 mb-3">{{ $product->description }}</div>
                    <div class="flex gap-5 text-sm font-bold">

                        <div class="">Stock : {{ number_format($product->stock) }}</div>
                        <div class="">Price : {{ number_format($product->price) }}</div>
                    </div>
                </div>
                <div class="py-4">
                    <div class="flex justify-between">

                        <div class="my-auto text-sm uppercase font-bold text-gray-700">Transactions</div>
                        @livewire('transaction.create', ['product' => $product], key(rand()))
                    </div>
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


                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @forelse ($product->transactions as $transaction)
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-0">
                                        {{ $transaction->id }}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                        {{ $transaction->reference_no }}</td>
                                    <td
                                        class="whitespace-nowrap text-right px-2 py-2 text-sm font-medium text-gray-900">
                                        {{ number_format($transaction->price, 0, 2) }}</td>
                                    <td
                                        class="whitespace-nowrap text-right px-2 py-2 text-sm font-medium text-gray-900">
                                        {{ number_format($transaction->quantity, 0, 2) }}</td>
                                    <td
                                        class="whitespace-nowrap text-right px-2 py-2 text-sm font-medium text-gray-900">
                                        {{ number_format($transaction->payment_amount, 0, 2) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="whitespace-nowrap px-2 py-2 text-center text-gray-500" colspan="7">
                                        There is no data
                                    </td>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>



            </div>

        </div>
    </div>
</div>
