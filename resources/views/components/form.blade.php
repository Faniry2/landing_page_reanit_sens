<section class="form-section" id="form" aria-label="Formulaire d'inscription — Recevoir ta Carte de Traversée Personnelle">
    <div class="container">

        <div class="reveal fu">
            <span class="sec-label" style="text-align:center;display:block;">✦ Premier pas</span>
            <h2 class="sec-title" style="color:var(--dark2);font-size:1.9rem;">
                Reçois ta Carte de <em>Traversée Personnelle</em>
            </h2>
        </div>

        <div class="form-box reveal fu d2">
            {{-- ✅ id="inscriptionForm" — requis par le JS
                 ✅ action="{{ route('inscription.store') }}" — route Laravel POST
                 ✅ method="POST" — requis pour FormData --}}
            <form
                id="inscriptionForm"
                action="{{ route('inscription.store') }}"
                method="POST"
                novalidate>

                @csrf {{-- ✅ token CSRF Laravel --}}

                {{-- Type d'inscription (valeur fixe ou dynamique selon le contexte) --}}
                <input type="hidden" name="type" value="carte_traversee">

                <div class="form-group">
                    <label class="form-label" for="prenom">Prénom</label>
                    <input
                        class="form-input @error('prenom') input-error @enderror"
                        type="text"
                        id="prenom"
                        name="prenom"
                        placeholder="Ton prénom"
                        value="{{ old('prenom') }}"
                        required
                        autocomplete="given-name">
                    @error('prenom')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input
                        class="form-input @error('email') input-error @enderror"
                        type="email"
                        id="email"
                        name="email"
                        placeholder="ton@email.com"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email">
                    @error('email')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="telephone">Téléphone <span style="opacity:.5;font-size:.8em;">(optionnel)</span></label>
                    <input
                        class="form-input @error('telephone') input-error @enderror"
                        type="tel"
                        id="telephone"
                        name="telephone"
                        placeholder="+261 XX XX XXX XX"
                        value="{{ old('telephone') }}"
                        autocomplete="tel">
                    @error('telephone')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-check">
                    <input
                        type="checkbox"
                        id="consent"
                        name="consent"
                        value="1"
                        {{ old('consent') ? 'checked' : '' }}
                        required>
                    <label for="consent">
                        J'accepte de recevoir les contenus et propositions de Renaît-Sens.
                        Je peux me désinscrire à tout moment.
                    </label>
                </div>
                @error('consent')
                    <span class="field-error" style="margin-top:.3rem;display:block;">{{ $message }}</span>
                @enderror

                {{-- ✅ type="submit" — requis par le JS pour cibler le bouton --}}
                <button
                    type="submit"
                    class="btn-gold"
                    style="width:100%;justify-content:center;padding:1rem;border:none;cursor:pointer;">
                    ✦ Réserve ta session offerte avec la Sentinelle
                </button>

            </form>
        </div>

    </div>
</section>
