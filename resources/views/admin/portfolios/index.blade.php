<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ポートフォリオ一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2 text-left">タイトル</th>
                            <th class="border p-2 text-left">カテゴリ</th>
                            <th class="border p-2 text-left">作成日</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($portfolios as $portfolio)
                            <tr>
                                <td class="border p-2">{{ $portfolio->title }}</td>
                                <td class="border p-2">{{ $portfolio->category->name ?? '未設定' }}</td>
                                <td class="border p-2">{{ optional($portfolio->created_at)->format('Y-m-d') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="border p-2" colspan="3">データがありません</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
