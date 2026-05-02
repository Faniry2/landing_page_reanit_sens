{{-- ═══════════════════════════════════════════════════════
     CHAMP TÉLÉPHONE INTERNATIONALISÉ
     À inclure dans ton form.blade.php
     Remplace les 2 form-group telephone et whatsapp
     ═══════════════════════════════════════════════════════ --}}

{{-- Téléphone avec indicatif --}}
<div class="form-group">
    <label class="form-label" for="telephone">Téléphone</label>
    <div class="phone-input-wrap">

        {{-- Sélecteur indicatif --}}
        <div class="phone-flag-select" id="phoneSelect" tabindex="0" aria-label="Choisir l'indicatif pays">
            <span class="phone-flag" id="phoneFlag">🇲🇬</span>
            <span class="phone-code" id="phoneCode">+261</span>
            <svg class="phone-arrow" viewBox="0 0 24 24" width="12" height="12">
                <polyline points="6 9 12 15 18 9" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"/>
            </svg>

            {{-- Dropdown --}}
            <div class="phone-dropdown" id="phoneDropdown" role="listbox">
                <div class="phone-search-wrap">
                    <input
                        type="text"
                        class="phone-search"
                        id="phoneSearch"
                        placeholder="Rechercher un pays..."
                        autocomplete="off">
                </div>
                <ul class="phone-list" id="phoneList">
                    {{-- Populaires en haut --}}
                    <li class="phone-list-label">Fréquents</li>
                    <li class="phone-option active" data-code="+261" data-flag="🇲🇬" data-name="Madagascar" role="option">
                        <span class="phone-option-flag">🇲🇬</span>
                        <span class="phone-option-name">Madagascar</span>
                        <span class="phone-option-code">+261</span>
                    </li>
                    <li class="phone-option" data-code="+33" data-flag="🇫🇷" data-name="France" role="option">
                        <span class="phone-option-flag">🇫🇷</span>
                        <span class="phone-option-name">France</span>
                        <span class="phone-option-code">+33</span>
                    </li>
                    <li class="phone-option" data-code="+32" data-flag="🇧🇪" data-name="Belgique" role="option">
                        <span class="phone-option-flag">🇧🇪</span>
                        <span class="phone-option-name">Belgique</span>
                        <span class="phone-option-code">+32</span>
                    </li>
                    <li class="phone-option" data-code="+41" data-flag="🇨🇭" data-name="Suisse" role="option">
                        <span class="phone-option-flag">🇨🇭</span>
                        <span class="phone-option-name">Suisse</span>
                        <span class="phone-option-code">+41</span>
                    </li>
                    <li class="phone-option" data-code="+1" data-flag="🇨🇦" data-name="Canada" role="option">
                        <span class="phone-option-flag">🇨🇦</span>
                        <span class="phone-option-name">Canada</span>
                        <span class="phone-option-code">+1</span>
                    </li>
                    <li class="phone-option" data-code="+237" data-flag="🇨🇲" data-name="Cameroun" role="option">
                        <span class="phone-option-flag">🇨🇲</span>
                        <span class="phone-option-name">Cameroun</span>
                        <span class="phone-option-code">+237</span>
                    </li>
                    <li class="phone-option" data-code="+225" data-flag="🇨🇮" data-name="Côte d'Ivoire" role="option">
                        <span class="phone-option-flag">🇨🇮</span>
                        <span class="phone-option-name">Côte d'Ivoire</span>
                        <span class="phone-option-code">+225</span>
                    </li>
                    <li class="phone-option" data-code="+212" data-flag="🇲🇦" data-name="Maroc" role="option">
                        <span class="phone-option-flag">🇲🇦</span>
                        <span class="phone-option-name">Maroc</span>
                        <span class="phone-option-code">+212</span>
                    </li>
                    <li class="phone-list-label">Tous les pays</li>
                    <li class="phone-option" data-code="+213" data-flag="🇩🇿" data-name="Algérie" role="option">
                        <span class="phone-option-flag">🇩🇿</span>
                        <span class="phone-option-name">Algérie</span>
                        <span class="phone-option-code">+213</span>
                    </li>
                    <li class="phone-option" data-code="+244" data-flag="🇦🇴" data-name="Angola" role="option">
                        <span class="phone-option-flag">🇦🇴</span>
                        <span class="phone-option-name">Angola</span>
                        <span class="phone-option-code">+244</span>
                    </li>
                    <li class="phone-option" data-code="+229" data-flag="🇧🇯" data-name="Bénin" role="option">
                        <span class="phone-option-flag">🇧🇯</span>
                        <span class="phone-option-name">Bénin</span>
                        <span class="phone-option-code">+229</span>
                    </li>
                    <li class="phone-option" data-code="+267" data-flag="🇧🇼" data-name="Botswana" role="option">
                        <span class="phone-option-flag">🇧🇼</span>
                        <span class="phone-option-name">Botswana</span>
                        <span class="phone-option-code">+267</span>
                    </li>
                    <li class="phone-option" data-code="+226" data-flag="🇧🇫" data-name="Burkina Faso" role="option">
                        <span class="phone-option-flag">🇧🇫</span>
                        <span class="phone-option-name">Burkina Faso</span>
                        <span class="phone-option-code">+226</span>
                    </li>
                    <li class="phone-option" data-code="+257" data-flag="🇧🇮" data-name="Burundi" role="option">
                        <span class="phone-option-flag">🇧🇮</span>
                        <span class="phone-option-name">Burundi</span>
                        <span class="phone-option-code">+257</span>
                    </li>
                    <li class="phone-option" data-code="+238" data-flag="🇨🇻" data-name="Cap-Vert" role="option">
                        <span class="phone-option-flag">🇨🇻</span>
                        <span class="phone-option-name">Cap-Vert</span>
                        <span class="phone-option-code">+238</span>
                    </li>
                    <li class="phone-option" data-code="+236" data-flag="🇨🇫" data-name="Centrafrique" role="option">
                        <span class="phone-option-flag">🇨🇫</span>
                        <span class="phone-option-name">Centrafrique</span>
                        <span class="phone-option-code">+236</span>
                    </li>
                    <li class="phone-option" data-code="+269" data-flag="🇰🇲" data-name="Comores" role="option">
                        <span class="phone-option-flag">🇰🇲</span>
                        <span class="phone-option-name">Comores</span>
                        <span class="phone-option-code">+269</span>
                    </li>
                    <li class="phone-option" data-code="+243" data-flag="🇨🇩" data-name="Congo RDC" role="option">
                        <span class="phone-option-flag">🇨🇩</span>
                        <span class="phone-option-name">Congo RDC</span>
                        <span class="phone-option-code">+243</span>
                    </li>
                    <li class="phone-option" data-code="+242" data-flag="🇨🇬" data-name="Congo" role="option">
                        <span class="phone-option-flag">🇨🇬</span>
                        <span class="phone-option-name">Congo</span>
                        <span class="phone-option-code">+242</span>
                    </li>
                    <li class="phone-option" data-code="+253" data-flag="🇩🇯" data-name="Djibouti" role="option">
                        <span class="phone-option-flag">🇩🇯</span>
                        <span class="phone-option-name">Djibouti</span>
                        <span class="phone-option-code">+253</span>
                    </li>
                    <li class="phone-option" data-code="+20" data-flag="🇪🇬" data-name="Égypte" role="option">
                        <span class="phone-option-flag">🇪🇬</span>
                        <span class="phone-option-name">Égypte</span>
                        <span class="phone-option-code">+20</span>
                    </li>
                    <li class="phone-option" data-code="+240" data-flag="🇬🇶" data-name="Guinée Équatoriale" role="option">
                        <span class="phone-option-flag">🇬🇶</span>
                        <span class="phone-option-name">Guinée Équatoriale</span>
                        <span class="phone-option-code">+240</span>
                    </li>
                    <li class="phone-option" data-code="+291" data-flag="🇪🇷" data-name="Érythrée" role="option">
                        <span class="phone-option-flag">🇪🇷</span>
                        <span class="phone-option-name">Érythrée</span>
                        <span class="phone-option-code">+291</span>
                    </li>
                    <li class="phone-option" data-code="+251" data-flag="🇪🇹" data-name="Éthiopie" role="option">
                        <span class="phone-option-flag">🇪🇹</span>
                        <span class="phone-option-name">Éthiopie</span>
                        <span class="phone-option-code">+251</span>
                    </li>
                    <li class="phone-option" data-code="+241" data-flag="🇬🇦" data-name="Gabon" role="option">
                        <span class="phone-option-flag">🇬🇦</span>
                        <span class="phone-option-name">Gabon</span>
                        <span class="phone-option-code">+241</span>
                    </li>
                    <li class="phone-option" data-code="+220" data-flag="🇬🇲" data-name="Gambie" role="option">
                        <span class="phone-option-flag">🇬🇲</span>
                        <span class="phone-option-name">Gambie</span>
                        <span class="phone-option-code">+220</span>
                    </li>
                    <li class="phone-option" data-code="+233" data-flag="🇬🇭" data-name="Ghana" role="option">
                        <span class="phone-option-flag">🇬🇭</span>
                        <span class="phone-option-name">Ghana</span>
                        <span class="phone-option-code">+233</span>
                    </li>
                    <li class="phone-option" data-code="+224" data-flag="🇬🇳" data-name="Guinée" role="option">
                        <span class="phone-option-flag">🇬🇳</span>
                        <span class="phone-option-name">Guinée</span>
                        <span class="phone-option-code">+224</span>
                    </li>
                    <li class="phone-option" data-code="+245" data-flag="🇬🇼" data-name="Guinée-Bissau" role="option">
                        <span class="phone-option-flag">🇬🇼</span>
                        <span class="phone-option-name">Guinée-Bissau</span>
                        <span class="phone-option-code">+245</span>
                    </li>
                    <li class="phone-option" data-code="+254" data-flag="🇰🇪" data-name="Kenya" role="option">
                        <span class="phone-option-flag">🇰🇪</span>
                        <span class="phone-option-name">Kenya</span>
                        <span class="phone-option-code">+254</span>
                    </li>
                    <li class="phone-option" data-code="+266" data-flag="🇱🇸" data-name="Lesotho" role="option">
                        <span class="phone-option-flag">🇱🇸</span>
                        <span class="phone-option-name">Lesotho</span>
                        <span class="phone-option-code">+266</span>
                    </li>
                    <li class="phone-option" data-code="+231" data-flag="🇱🇷" data-name="Libéria" role="option">
                        <span class="phone-option-flag">🇱🇷</span>
                        <span class="phone-option-name">Libéria</span>
                        <span class="phone-option-code">+231</span>
                    </li>
                    <li class="phone-option" data-code="+218" data-flag="🇱🇾" data-name="Libye" role="option">
                        <span class="phone-option-flag">🇱🇾</span>
                        <span class="phone-option-name">Libye</span>
                        <span class="phone-option-code">+218</span>
                    </li>
                    <li class="phone-option" data-code="+223" data-flag="🇲🇱" data-name="Mali" role="option">
                        <span class="phone-option-flag">🇲🇱</span>
                        <span class="phone-option-name">Mali</span>
                        <span class="phone-option-code">+223</span>
                    </li>
                    <li class="phone-option" data-code="+222" data-flag="🇲🇷" data-name="Mauritanie" role="option">
                        <span class="phone-option-flag">🇲🇷</span>
                        <span class="phone-option-name">Mauritanie</span>
                        <span class="phone-option-code">+222</span>
                    </li>
                    <li class="phone-option" data-code="+230" data-flag="🇲🇺" data-name="Maurice" role="option">
                        <span class="phone-option-flag">🇲🇺</span>
                        <span class="phone-option-name">Maurice</span>
                        <span class="phone-option-code">+230</span>
                    </li>
                    <li class="phone-option" data-code="+258" data-flag="🇲🇿" data-name="Mozambique" role="option">
                        <span class="phone-option-flag">🇲🇿</span>
                        <span class="phone-option-name">Mozambique</span>
                        <span class="phone-option-code">+258</span>
                    </li>
                    <li class="phone-option" data-code="+264" data-flag="🇳🇦" data-name="Namibie" role="option">
                        <span class="phone-option-flag">🇳🇦</span>
                        <span class="phone-option-name">Namibie</span>
                        <span class="phone-option-code">+264</span>
                    </li>
                    <li class="phone-option" data-code="+227" data-flag="🇳🇪" data-name="Niger" role="option">
                        <span class="phone-option-flag">🇳🇪</span>
                        <span class="phone-option-name">Niger</span>
                        <span class="phone-option-code">+227</span>
                    </li>
                    <li class="phone-option" data-code="+234" data-flag="🇳🇬" data-name="Nigéria" role="option">
                        <span class="phone-option-flag">🇳🇬</span>
                        <span class="phone-option-name">Nigéria</span>
                        <span class="phone-option-code">+234</span>
                    </li>
                    <li class="phone-option" data-code="+250" data-flag="🇷🇼" data-name="Rwanda" role="option">
                        <span class="phone-option-flag">🇷🇼</span>
                        <span class="phone-option-name">Rwanda</span>
                        <span class="phone-option-code">+250</span>
                    </li>
                    <li class="phone-option" data-code="+239" data-flag="🇸🇹" data-name="São Tomé" role="option">
                        <span class="phone-option-flag">🇸🇹</span>
                        <span class="phone-option-name">São Tomé</span>
                        <span class="phone-option-code">+239</span>
                    </li>
                    <li class="phone-option" data-code="+221" data-flag="🇸🇳" data-name="Sénégal" role="option">
                        <span class="phone-option-flag">🇸🇳</span>
                        <span class="phone-option-name">Sénégal</span>
                        <span class="phone-option-code">+221</span>
                    </li>
                    <li class="phone-option" data-code="+248" data-flag="🇸🇨" data-name="Seychelles" role="option">
                        <span class="phone-option-flag">🇸🇨</span>
                        <span class="phone-option-name">Seychelles</span>
                        <span class="phone-option-code">+248</span>
                    </li>
                    <li class="phone-option" data-code="+232" data-flag="🇸🇱" data-name="Sierra Leone" role="option">
                        <span class="phone-option-flag">🇸🇱</span>
                        <span class="phone-option-name">Sierra Leone</span>
                        <span class="phone-option-code">+232</span>
                    </li>
                    <li class="phone-option" data-code="+252" data-flag="🇸🇴" data-name="Somalie" role="option">
                        <span class="phone-option-flag">🇸🇴</span>
                        <span class="phone-option-name">Somalie</span>
                        <span class="phone-option-code">+252</span>
                    </li>
                    <li class="phone-option" data-code="+27" data-flag="🇿🇦" data-name="Afrique du Sud" role="option">
                        <span class="phone-option-flag">🇿🇦</span>
                        <span class="phone-option-name">Afrique du Sud</span>
                        <span class="phone-option-code">+27</span>
                    </li>
                    <li class="phone-option" data-code="+211" data-flag="🇸🇸" data-name="Soudan du Sud" role="option">
                        <span class="phone-option-flag">🇸🇸</span>
                        <span class="phone-option-name">Soudan du Sud</span>
                        <span class="phone-option-code">+211</span>
                    </li>
                    <li class="phone-option" data-code="+249" data-flag="🇸🇩" data-name="Soudan" role="option">
                        <span class="phone-option-flag">🇸🇩</span>
                        <span class="phone-option-name">Soudan</span>
                        <span class="phone-option-code">+249</span>
                    </li>
                    <li class="phone-option" data-code="+268" data-flag="🇸🇿" data-name="Eswatini" role="option">
                        <span class="phone-option-flag">🇸🇿</span>
                        <span class="phone-option-name">Eswatini</span>
                        <span class="phone-option-code">+268</span>
                    </li>
                    <li class="phone-option" data-code="+255" data-flag="🇹🇿" data-name="Tanzanie" role="option">
                        <span class="phone-option-flag">🇹🇿</span>
                        <span class="phone-option-name">Tanzanie</span>
                        <span class="phone-option-code">+255</span>
                    </li>
                    <li class="phone-option" data-code="+228" data-flag="🇹🇬" data-name="Togo" role="option">
                        <span class="phone-option-flag">🇹🇬</span>
                        <span class="phone-option-name">Togo</span>
                        <span class="phone-option-code">+228</span>
                    </li>
                    <li class="phone-option" data-code="+216" data-flag="🇹🇳" data-name="Tunisie" role="option">
                        <span class="phone-option-flag">🇹🇳</span>
                        <span class="phone-option-name">Tunisie</span>
                        <span class="phone-option-code">+216</span>
                    </li>
                    <li class="phone-option" data-code="+256" data-flag="🇺🇬" data-name="Ouganda" role="option">
                        <span class="phone-option-flag">🇺🇬</span>
                        <span class="phone-option-name">Ouganda</span>
                        <span class="phone-option-code">+256</span>
                    </li>
                    <li class="phone-option" data-code="+260" data-flag="🇿🇲" data-name="Zambie" role="option">
                        <span class="phone-option-flag">🇿🇲</span>
                        <span class="phone-option-name">Zambie</span>
                        <span class="phone-option-code">+260</span>
                    </li>
                    <li class="phone-option" data-code="+263" data-flag="🇿🇼" data-name="Zimbabwe" role="option">
                        <span class="phone-option-flag">🇿🇼</span>
                        <span class="phone-option-name">Zimbabwe</span>
                        <span class="phone-option-code">+263</span>
                    </li>
                    <li class="phone-option" data-code="+44" data-flag="🇬🇧" data-name="Royaume-Uni" role="option">
                        <span class="phone-option-flag">🇬🇧</span>
                        <span class="phone-option-name">Royaume-Uni</span>
                        <span class="phone-option-code">+44</span>
                    </li>
                    <li class="phone-option" data-code="+49" data-flag="🇩🇪" data-name="Allemagne" role="option">
                        <span class="phone-option-flag">🇩🇪</span>
                        <span class="phone-option-name">Allemagne</span>
                        <span class="phone-option-code">+49</span>
                    </li>
                    <li class="phone-option" data-code="+34" data-flag="🇪🇸" data-name="Espagne" role="option">
                        <span class="phone-option-flag">🇪🇸</span>
                        <span class="phone-option-name">Espagne</span>
                        <span class="phone-option-code">+34</span>
                    </li>
                    <li class="phone-option" data-code="+39" data-flag="🇮🇹" data-name="Italie" role="option">
                        <span class="phone-option-flag">🇮🇹</span>
                        <span class="phone-option-name">Italie</span>
                        <span class="phone-option-code">+39</span>
                    </li>
                    <li class="phone-option" data-code="+351" data-flag="🇵🇹" data-name="Portugal" role="option">
                        <span class="phone-option-flag">🇵🇹</span>
                        <span class="phone-option-name">Portugal</span>
                        <span class="phone-option-code">+351</span>
                    </li>
                    <li class="phone-option" data-code="+1" data-flag="🇺🇸" data-name="États-Unis" role="option">
                        <span class="phone-option-flag">🇺🇸</span>
                        <span class="phone-option-name">États-Unis</span>
                        <span class="phone-option-code">+1</span>
                    </li>
                    <li class="phone-option" data-code="+55" data-flag="🇧🇷" data-name="Brésil" role="option">
                        <span class="phone-option-flag">🇧🇷</span>
                        <span class="phone-option-name">Brésil</span>
                        <span class="phone-option-code">+55</span>
                    </li>
                    <li class="phone-option" data-code="+971" data-flag="🇦🇪" data-name="Émirats Arabes" role="option">
                        <span class="phone-option-flag">🇦🇪</span>
                        <span class="phone-option-name">Émirats Arabes</span>
                        <span class="phone-option-code">+971</span>
                    </li>
                    <li class="phone-option" data-code="+966" data-flag="🇸🇦" data-name="Arabie Saoudite" role="option">
                        <span class="phone-option-flag">🇸🇦</span>
                        <span class="phone-option-name">Arabie Saoudite</span>
                        <span class="phone-option-code">+966</span>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Input numéro local --}}
        <input
            class="form-input phone-number-input @error('telephone') input-error @enderror"
            type="tel"
            id="telephone"
            name="telephone"
            placeholder="32 00 000 00"
            value="{{ old('telephone') }}"
            required
            autocomplete="tel-national"
            inputmode="numeric">

        {{-- Champ caché avec numéro complet international --}}
        <input type="hidden" id="telephoneFormatted" name="telephone_formatted">
    </div>
    @error('telephone')
        <span class="field-error">{{ $message }}</span>
    @enderror
</div>

{{-- WhatsApp avec indicatif --}}
<div class="form-group">
    <label class="form-label" for="whatsapp">
        WhatsApp
        <span style="opacity:.5;font-size:.8em;">(si différent du téléphone)</span>
    </label>
    <div class="phone-input-wrap">

        <div class="phone-flag-select" id="waSelect" tabindex="0" aria-label="Choisir l'indicatif WhatsApp">
            <span class="phone-flag" id="waFlag">🇲🇬</span>
            <span class="phone-code" id="waCode">+261</span>
            <svg class="phone-arrow" viewBox="0 0 24 24" width="12" height="12">
                <polyline points="6 9 12 15 18 9" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"/>
            </svg>
            <div class="phone-dropdown" id="waDropdown" role="listbox">
                {{-- Même liste — clonée par JS --}}
            </div>
        </div>

        <input
            class="form-input phone-number-input @error('whatsapp') input-error @enderror"
            type="tel"
            id="whatsapp"
            name="whatsapp"
            placeholder="32 00 000 00"
            value="{{ old('whatsapp') }}"
            autocomplete="tel-national"
            inputmode="numeric">

        <input type="hidden" id="whatsappFormatted" name="whatsapp_formatted">
    </div>
    @error('whatsapp')
        <span class="field-error">{{ $message }}</span>
    @enderror
</div>
