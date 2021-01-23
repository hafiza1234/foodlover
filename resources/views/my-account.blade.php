<x-app-layout :py=1>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update Profile
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row justify-content-center">
                        <div class="col-md-8 ">
                            <form method="POST" action="{{ url('my-account') }}" enctype="multipart/form-data">
                                @csrf
                    
                                <!-- Name -->
                                <div>
                                    <x-label for="name" :value="__('Name')" />
                    
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required autofocus />
                                </div>
                    
                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-label for="email" :value="__('Email (read only)')" />
                    
                                    <x-input readonly="true" disabled id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email" required />
                                </div>
                    
                                  <!-- Email Mobile -->
                                <div class="mt-4">
                                    <x-label for="mobile" :value="__('Mobile')" />
                    
                                    <x-input id="mobile" class="block mt-1 w-full" type="text" maxlength=11 name="mobile" :value="$user->mobile" required />
                                </div>
                    
                                <!-- Password -->
                                <div class="mt-4">
                                    <x-label for="password" :value="__('Password (If you want to change)')" />
                    
                                    <x-input id="password" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password"
                                                    autocomplete="new-password" />
                                </div>
                    
                                <!-- Confirm Password -->
                                <div class="mt-4">
                                    <x-label for="password_confirmation" :value="__('Confirm Password')" />
                    
                                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password_confirmation" />
                                </div>
                                <div class="mt-4">
                                    <x-label for="image" :value="__('Select Profile Image')" />
                                    
                                    @if($user->avatar_url)
                                        <img src="{{ $user->avatar_url }}" width="100">
                                    @endif

                                    <x-input id="image" class="block mt-1 w-full"
                                                    type="file"
                                                    name="image"  />
                                </div>
                                <div class="mt-3">
                                    <x-label for="description" :value="__('Description')" />

                                    <textarea name="description" class="form-control">{{ isset($user) ? $user->description : ''}}</textarea>
                                </div>
                                <div class="flex items-center justify-start mt-4">
                                    <x-button class="">
                                        {{ __('Save') }}
                                    </x-button>
                                </div>
                            </form>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
