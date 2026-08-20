@extends('layouts.app')
@section('title', 'Politique de confidentialité — SikaFlow')
@section('meta_description', 'Politique de confidentialité de SikaFlow. Découvrez comment nous collectons, utilisons et protégeons vos données personnelles.')
@section('content')

<section class="relative overflow-hidden hero-gradient text-white">
  <div class="absolute inset-0 hero-grid"></div>
  <div class="relative max-w-3xl mx-auto px-4 py-20 sm:py-28 text-center">
    <span class="eyebrow-dark">Légal</span>
    <h1 class="text-4xl sm:text-5xl font-bold mb-5 mt-5 tracking-tight">Politique de confidentialité</h1>
    <p class="text-slate-300 text-sm sm:text-base">Dernière mise à jour : {{ date('d/m/Y') }}</p>
  </div>
</section>

<section class="max-w-3xl mx-auto px-4 py-14 sm:py-20 prose prose-slate prose-headings:text-night-900 prose-a:text-sika-600">
  <h2>1. Responsable du traitement</h2>
  <p><strong>HODD GLOBAL</strong>, startup fintech basée à Porto-Novo, Bénin, est responsable du traitement des données personnelles collectées via la plateforme SikaFlow.</p>
  <p>Contact : <a href="mailto:hoddglobal.contacts@gmail.com">hoddglobal.contacts@gmail.com</a> · +229 01 97 45 87 25</p>

  <h2>2. Données collectées</h2>
  <p>Nous collectons les données suivantes :</p>
  <ul>
    <li><strong>Données d'identification</strong> : nom complet, numéro de téléphone, adresse e-mail</li>
    <li><strong>Données financières</strong> : informations sur vos prêts, abonnements et échéanciers</li>
    <li><strong>Données de paiement</strong> : moyens de paiement liés (Mobile Money, compte bancaire) — les codes PIN ne sont jamais stockés</li>
    <li><strong>Données de connexion</strong> : adresse IP, type de navigateur, pages visitées</li>
  </ul>

  <h2>3. Finalités du traitement</h2>
  <p>Vos données sont utilisées pour :</p>
  <ul>
    <li>Fournir et gérer les services de SikaFlow</li>
    <li>Automatiser vos paiements et rappels d'échéances</li>
    <li>Vous envoyer des notifications liées à vos engagements</li>
    <li>Assurer la sécurité de votre compte</li>
    <li>Améliorer nos services</li>
  </ul>

  <h2>4. Base légale</h2>
  <p>Le traitement repose sur :</p>
  <ul>
    <li>L'exécution du contrat d'utilisation de SikaFlow</li>
    <li>Votre consentement explicite</li>
    <li>Notre intérêt légitime à assurer la sécurité du service</li>
  </ul>

  <h2>5. Sécurité des données</h2>
  <p>Nous mettons en œuvre des mesures techniques et organisationnelles appropriées :</p>
  <ul>
    <li>Chiffrement SSL/TLS sur toutes les communications</li>
    <li>Hachage des mots de passe avec bcrypt</li>
    <li>Authentification sécurisée par OTP</li>
    <li>Aucun stockage de codes PIN ou mots de passe bancaires</li>
  </ul>

  <h2>6. Durée de conservation</h2>
  <p>Vos données sont conservées pendant toute la durée de votre compte et pendant 12 mois après la dernière activité. Vous pouvez demander la suppression de votre compte à tout moment.</p>

  <h2>7. Vos droits</h2>
  <p>Conformément à la réglementation en vigueur au Bénin, vous disposez des droits suivants :</p>
  <ul>
    <li><strong>Droit d'accès</strong> : obtenir une copie de vos données</li>
    <li><strong>Droit de rectification</strong> : corriger des données inexactes</li>
    <li><strong>Droit de suppression</strong> : demander la suppression de vos données</li>
    <li><strong>Droit d'opposition</strong> : vous opposer au traitement pour motifs légitimes</li>
  </ul>
  <p>Pour exercer vos droits : <a href="mailto:hoddglobal.contacts@gmail.com">hoddglobal.contacts@gmail.com</a></p>

  <h2>8. Cookies</h2>
  <p>SikaFlow utilise des cookies strictement nécessaires au fonctionnement du service (session, préférences). Aucun cookie publicitaire n'est utilisé.</p>

  <h2>9. Modifications</h2>
  <p>Cette politique peut être mise à jour. Toute modification sera communiquée via la plateforme ou par e-mail.</p>

  <h2>10. Contact</h2>
  <p>Pour toute question relative à cette politique : <a href="mailto:hoddglobal.contacts@gmail.com">hoddglobal.contacts@gmail.com</a></p>
</section>

@endsection
