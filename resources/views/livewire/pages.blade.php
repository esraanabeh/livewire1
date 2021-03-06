<div class=p-6>
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
    <x-jet-button wire:click="createShowModal">
        {{ __('Create') }}
    </x-jet-button>
    </div>
     <table class="min-w-full divide-y divide-gray-200">
         <thead>
             <tr>
                 <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</th>
                 <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">user</th>
                 <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">content</th>
                 <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
             </tr>
         </thead>
         <tbody class="bg-white divide-y divide-gray-200">
             @if ($data->count())
             @foreach ($data as $item)

             <tr>
                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                    {{ $item->title }}
                    {!! $item->is_default_home ? '<span class="text-green-400 text-xs font-bold">[Default Home Page]</span>':''!!}
                    {!! $item->is_default_not_found ? '<span class="text-red-400 text-xs font-bold">[Default 404 Page]</span>':''!!}
                </td>
                <td class="px-6 py-4 text-sm whitespace-no-wrap">
                    {{ $item->user }}
                    {!! $item->is_default_home ? '<span class="text-green-400 text-xs font-bold">[Default Home Page]</span>':''!!}
                    {!! $item->is_default_not_found ? '<span class="text-red-400 text-xs font-bold">[Default 404 Page]</span>':''!!}
                </td>
                
                 <td class="px-6 py-4 text-sm whitespace-no-wrap">{!! \Illuminate\Support\Str::limit($item->content, 50, '...') !!}</td>
                 <td class="px-6 py-4 text-right text-sm">
                    <x-jet-button wire:click="updateShowModal({{ $item->id }})">
                        {{ __('Update') }}
                    </x-jet-button>
                    <x-jet-danger-button wire:click="deleteShowModal({{ $item->id }})">
                        {{ __('Delete') }}
                    </x-jet-button>
                </td>
             </tr>
             @endforeach
             @else
             <tr>
                 <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">no result found </td>
              </tr>
              @endif
         </tbody>
     </table>
                 



    <x-jet-dialog-modal wire:model="modalFormvisible">
        <x-slot name="title">
            {{ __('save page') }}  {{$modelId}}
        </x-slot>

        <x-slot name="content">
           
            <div class="mt-4">
                <x-jet-label for="title" value="{{ __('Title') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="title" />
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for="user" value="{{ __('user') }}" />
                <x-jet-input id="user" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="user" />
                @error('user') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="title" value="{{ __('content') }}" />
                <div class="rounded-md shadow-sm">
                    <div class="mt-1 bg-white">                      
                        <div class="body-content" wire:ignore>                            
                            <trix-editor
                                class="trix-content"
                                x-ref="trix"
                                wire:model.debounce.100000ms="content"
                                wire:key="trix-content-unique-key"
                            ></trix-editor>
                        </div>
                    </div>
                    @error('content') <span class="error">{{$message}}</span>
                        
                    @enderror
                
            </div>
        </x-slot>

        <x-slot name="footer">
            {{-- <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button> --}}

            @if($modelId)

            <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                {{ __('update') }}
            </x-jet-danger-button>
            @else
            <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                {{ __('create') }}
            </x-jet-danger-button>
            @endif

        </x-slot>

        </x-jet-dialog-modal>

        <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
            <x-slot name="title">
                {{ __('Delete page') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete this page ') }}

              
            </x-slot>

            <x-slot name="footer">
                {{-- <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                    {{ __('Nevermind') }}
                </x-jet-secondary-button> --}}

                <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                    {{ __('Delete page') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    
</div>
