<div>
    <input type="text" wire:model.debounce.500ms="email" placeholder="Mail" class="form-control" />
    @if ($emailExists)
        <div class="alert-window" id="email-alert-window">
            <p id="email-alert-message">Cette adresse e-mail est déjà utilisée.</p>
        </div>
    @endif
</div>
