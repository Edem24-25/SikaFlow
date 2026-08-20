<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Votre code de vérification SikaFlow</title>
</head>
<body style="margin:0; padding:0; background-color:#f1f5f9; font-family:'Segoe UI', Helvetica, Arial, sans-serif; -webkit-font-smoothing:antialiased;">
  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#f1f5f9;">
    <tr>
      <td align="center" style="padding:32px 16px;">
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:520px; width:100%;">

          {{-- Logo --}}
          <tr>
            <td align="center" style="padding-bottom:24px;">
              <span style="display:inline-flex; align-items:center; gap:8px;">
                <span style="width:34px; height:34px; border-radius:10px; background:linear-gradient(135deg,#1fa16f,#128459); display:inline-block;"></span>
                <span style="font-size:22px; font-weight:800; color:#090f22; letter-spacing:-0.5px;">Sika<span style="color:#128459;">Flow</span></span>
              </span>
            </td>
          </tr>

          {{-- Carte principale --}}
          <tr>
            <td>
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:20px; overflow:hidden; border:1px solid #e2e8f0; box-shadow:0 20px 45px -20px rgba(9,15,34,0.18);">
                {{-- Bandeau supérieur --}}
                <tr>
                  <td style="background:linear-gradient(135deg,#090f22 0%,#0e1630 55%,#14203c 100%); padding:36px 32px 28px; text-align:center;">
                    <div style="width:56px; height:56px; border-radius:16px; background:rgba(255,255,255,0.12); border:1px solid rgba(255,255,255,0.18); display:flex; align-items:center; justify-content:center; margin:0 auto 14px;">
                      <span style="font-size:26px; line-height:1;">&#128274;</span>
                    </div>
                    <h1 style="margin:0; color:#ffffff; font-size:20px; font-weight:700; letter-spacing:-0.3px;">Vérification de votre compte</h1>
                    <p style="margin:6px 0 0; color:#a7d7c3; font-size:13px;">SikaFlow — Sécurité de votre compte</p>
                  </td>
                </tr>

                {{-- Corps --}}
                <tr>
                  <td style="padding:32px;">
                    <p style="margin:0 0 8px; color:#0f172a; font-size:15px; font-weight:600;">Bonjour {{ $nom }},</p>
                    <p style="margin:0 0 20px; color:#475569; font-size:14px; line-height:1.6;">
                      Vous avez demandé à vérifier votre compte. Utilisez le code ci-dessous pour finaliser votre inscription.
                    </p>

                    {{-- Code OTP --}}
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f0fdf6; border:1px solid #b1e8ce; border-radius:14px; margin-bottom:20px;">
                      <tr>
                        <td align="center" style="padding:22px 16px;">
                          <span style="font-size:34px; font-weight:800; letter-spacing:10px; color:#106949; font-family:Consolas, 'Courier New', monospace;">{{ $code }}</span>
                        </td>
                      </tr>
                    </table>

                    {{-- Validité --}}
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#fffbeb; border:1px solid #fde68a; border-radius:12px; margin-bottom:20px;">
                      <tr>
                        <td style="padding:12px 16px; font-size:13px; color:#92400e;">
                          &#9200; Ce code est valable <strong>10 minutes</strong>. S'il expire, demandez un nouveau code.
                        </td>
                      </tr>
                    </table>

                    <p style="margin:0 0 24px; color:#64748b; font-size:13px; line-height:1.6;">
                      Si vous n'êtes pas à l'origine de cette demande, ignorez simplement cet e-mail. Votre compte reste protégé.
                    </p>

                    <div style="height:1px; background:#e2e8f0; margin-bottom:20px;"></div>

                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" style="padding-bottom:16px;">
                          <a href="{{ config('app.url') }}" style="display:inline-block; background:#128459; color:#ffffff; font-size:14px; font-weight:700; text-decoration:none; padding:12px 32px; border-radius:12px;">
                            Accéder à SikaFlow
                          </a>
                        </td>
                      </tr>
                    </table>

                    <p style="margin:0; color:#94a3b8; font-size:12px; line-height:1.6; text-align:center;">
                      SikaFlow — Gérez vos prêts et abonnements en toute simplicité.<br>
                      Cet e-mail vous a été envoyé automatiquement, merci de ne pas y répondre.
                    </p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          {{-- Pied --}}
          <tr>
            <td align="center" style="padding-top:18px;">
              <p style="margin:0; color:#94a3b8; font-size:11px;">
                &copy; {{ date('Y') }} SikaFlow. Tous droits réservés.
              </p>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>
