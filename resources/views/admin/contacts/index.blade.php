<x-ba-admin-layout>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-t-2 border-{{$config->color ?? 'blue-200'}} sm:rounded-b-lg">

                    <div class="bg-gray-50 px-6 flex justify-between">
                        <div class="text-left font-bold text-gray-500 uppercase tracking-wider py-5">
                            {{ $showSpam ? 'Spam' : $config->name_to_use }}
                        </div>
                        <div class="my-auto text-sm font-medium flex gap-x-4">
                            @if($showSpam)
                                <a href="{{ $config->getIndexUrl() }}" class="text-indigo-600 hover:text-indigo-900">Toon inbox</a>
                            @else
                                <a href="{{ $config->getIndexUrl() }}?spam=1" class="text-indigo-600 hover:text-indigo-900">Toon spam</a>
                            @endif
                        </div>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200" id="indexTable">
                        <thead class="bg-gray-50">
                        <tr>
                            @foreach($config->getIndexTableColumns() as $column)
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ $column === 'title' ? $config->titleField() : $column }}
                                </th>
                            @endforeach
                            <th scope="col" class="relative px-6 py-3">
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($models as $model)
                            <tr class="@if($loop->odd) bg-white @else bg-gray-50 @endif hover:bg-gray-100">
                                @foreach($config->getIndexTableColumns() as $column)
                                    <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-gray-900">
                                        @if($column === 'title')
                                            @php $titlefield = $config->titleField() @endphp
                                            {{$model->$titlefield}}
                                        @elseif($column === 'is_spam')
                                            @if($model->is_spam)
                                                <span class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded">{{ $model->spam_reason ?? 'spam' }}</span>
                                            @else
                                                <span class="text-gray-400">&mdash;</span>
                                            @endif
                                        @else
                                            {{$model->$column}}
                                        @endif
                                    </td>
                                @endforeach
                                <td class="px-6 py-3 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{$config->getShowUrl($model->getKey())}}" class="text-indigo-600 hover:text-indigo-900 mr-4">Details</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ count($config->getIndexTableColumns()) + 1 }}" class="px-6 py-4 text-sm text-gray-500">
                                    Geen berichten.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    <script>
                        $(document).ready( function () {
                            $('#indexTable').DataTable();
                        } );
                    </script>


                </div>
            </div>
        </div>
    </div>

    @push('blueadmin_header')
        @include('BlueAdminLayout::dataTables')
    @endpush


</x-ba-admin-layout>
