{{-- ═══════════════════════════════════════════════════════
     CHAMP TÉLÉPHONE — intl-tel-input
     resources/views/partials/phone-field.blade.php
     ═══════════════════════════════════════════════════════ --}}

{{-- Téléphone --}}
<div class="form-group">
    <label class="form-label" for="telephone">Téléphone</label>
    <input
        class="form-input @error('telephone') input-error @enderror"
        type="tel"
        id="telephone"
        name="telephone"
        placeholder="Ton numéro"
        value="{{ old('telephone') }}"
        required
        autocomplete="tel">
    @error('telephone')
        <span class="field-error">{{ $message }}</span>
    @enderror
</div>

{{-- WhatsApp --}}
<div class="form-group">
    <label class="form-label" for="whatsapp">
        WhatsApp
        <span style="opacity:.5;font-size:.8em;">(si différent du téléphone)</span>
    </label>
    <input
        class="form-input @error('whatsapp') input-error @enderror"
        type="tel"
        id="whatsapp"
        name="whatsapp"
        placeholder="Ton numéro WhatsApp"
        value="{{ old('whatsapp') }}"
        autocomplete="tel">
    @error('whatsapp')
        <span class="field-error">{{ $message }}</span>
    @enderror
</div>
