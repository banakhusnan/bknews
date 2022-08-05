@component('mail::message')
# Verifikasi Email

Demi keamanan akun anda, diharap verifikasi email terlebih dahulu. klik tombol verifikasi dibawah ini

@component('mail::button', ['url' => $url])
Verifikasi
@endcomponent

Thanks,<br>
BK News
@endcomponent