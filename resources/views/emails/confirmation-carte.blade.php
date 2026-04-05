{{-- resources/views/emails/confirmation-carte.blade.php --}}
{{-- Utilisé si tu n'as pas encore créé le template Brevo --}}
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ta Carte de Traversée — Renaît-Sens</title>
</head>
<body style="margin:0;padding:0;background:#0C0C0C;font-family:Georgia,'Times New Roman',serif;">
  <table width="100%" cellpadding="0" cellspacing="0" style="background:#0C0C0C;padding:40px 20px;">
    <tr>
      <td align="center">
        <table width="560" cellpadding="0" cellspacing="0" style="max-width:560px;width:100%;background:#1A1A1A;border:1px solid rgba(201,168,76,.25);border-radius:16px;overflow:hidden;">

          {{-- Header --}}
          <tr>
            <td style="background:linear-gradient(135deg,rgba(201,168,76,.12),rgba(201,168,76,.03));padding:40px 40px 32px;border-bottom:1px solid rgba(201,168,76,.2);">
              <div style="font-size:10px;letter-spacing:.3em;text-transform:uppercase;color:#C9A84C;margin-bottom:10px;">✦ Renaît-Sens</div>
              <div style="font-size:28px;font-weight:300;color:#FAFAF7;line-height:1.2;">Ta Carte de<br><em style="color:#C9A84C;">Traversée Personnelle</em></div>
            </td>
          </tr>

          {{-- Body --}}
          <tr>
            <td style="padding:36px 40px;">
              <p style="font-size:18px;color:#FAFAF7;line-height:1.7;margin:0 0 20px;">
                Bonjour <strong style="color:#E8C97A;">{{ $prenom }}</strong>,
              </p>
              <p style="font-size:16px;color:rgba(250,250,247,.65);line-height:1.85;margin:0 0 20px;">
                Tu viens de faire un premier pas.<br>
                Ce n'est pas anodin.
              </p>
              <p style="font-size:16px;color:rgba(250,250,247,.65);line-height:1.85;margin:0 0 32px;">
                Nous allons préparer ta <strong style="color:#FAFAF7;">Carte de Traversée Personnelle</strong> et te la transmettre très prochainement. Elle t'aidera à voir où tu en es vraiment, ce que tu traverses, et ce qui appelle en toi aujourd'hui.
              </p>

              {{-- Divider --}}
              <div style="height:1px;background:linear-gradient(90deg,transparent,rgba(201,168,76,.4),transparent);margin:0 0 32px;"></div>

              <p style="font-size:15px;font-style:italic;color:rgba(250,250,247,.5);line-height:1.8;margin:0 0 32px;">
                "Il arrive un moment où survivre ne suffit plus.<br>
                Et où renaître devient nécessaire."
              </p>

              {{-- CTA --}}
              <table cellpadding="0" cellspacing="0" style="margin:0 auto;">
                <tr>
                  <td style="background:#C9A84C;border-radius:50px;padding:14px 32px;">
                    <a href="{{ config('app.url') }}" style="color:#0C0C0C;text-decoration:none;font-size:14px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;font-family:Arial,sans-serif;">
                      ✦ Revenir sur le site
                    </a>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          {{-- Footer --}}
          <tr>
            <td style="padding:24px 40px;border-top:1px solid rgba(255,255,255,.06);">
              <p style="font-size:12px;color:rgba(136,136,128,.6);margin:0;line-height:1.6;text-align:center;">
                Tu reçois cet email car tu t'es inscrit(e) sur <a href="{{ config('app.url') }}" style="color:#C9A84C;">renait-sens.com</a>.<br>
                Si tu ne souhaitais pas recevoir cet email, contacte-nous à <a href="mailto:contact@renait-sens.com" style="color:#C9A84C;">contact@renait-sens.com</a>
              </p>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>
