<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Usuarios') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Complete los siguientes datos y presione "Submit" para crear nuevos datos de usuario') }}
        </x-slot>


        <x-slot name="form">  

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Nombre del Usuario</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-text-height"></i>
                                </div>
                            </div>
                            <input id="name" type="text" class="form-control phone-number" wire:model.defer="user.name" autocomplete="name">
                        </div>
                        <x-jet-input-error for="name" class="mt-2" />

                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Apellido del Usuario</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-text-height"></i>
                                </div>
                            </div>
                            <input id="lastname" type="text" class="form-control phone-number" wire:model.defer="user.lastname" autocomplete="lastname">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>UserName</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <input id="username" type="text" class="form-control phone-number" wire:model.defer="user.username" autocomplete="username">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label>Correo Electrónico</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-at"></i>
                                </div>
                            </div>
                            <input id="email" type="text" class="form-control phone-number" wire:model.defer="user.email">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-7 col-12">
                        <label>Dirección</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-home"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control phone-number">
                        </div>
                    </div>
                    <div class="form-group col-md-5 col-12">
                        <label>Teléfono</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control phone-number">
                        </div>
                    </div>
                </div>
                @if ($action == "createUser")
                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label>Nueva Contraseña</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input id="password" type="password" class="form-control" wire:model.defer="user.password" autocomplete="current-password">
                        </div>
                        <x-jet-input-error for="password" class="mt-2" />
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label>Confirmar Contraseña</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input id="password_confirmation" type="password" class="form-control" wire:model.defer="user.password_confirmation" autocomplete="new-password">
                        </div>
                        <x-jet-input-error for="password_confirmation" class="mt-2" />
                    </div>
                </div>
                @endif
                <x-jet-action-message class="mr-3" on="saved">
                {{ __($button['submit_response']) }}
                </x-jet-action-message>

                <x-jet-button>
                    {{ __($button['submit_text']) }}
                </x-jet-button>
            </div>  
        </div>
            
            
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __($button['submit_response']) }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __($button['submit_text']) }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
</div>
