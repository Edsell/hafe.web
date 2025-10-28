@component('mail::message')
# 📬 New Student Application

**Submitted:** {{ $app->created_at?->format('Y-m-d H:i') ?? now()->format('Y-m-d H:i') }}

@component('mail::panel')
**Student:** {{ $app->first_name }} {{ $app->last_name }}
**DOB:** {{ optional($app->dob)->format('Y-m-d') ?: '—' }}
**Gender:** {{ $app->gender ?: '—' }}
**Class Applying For:** {{ $app->class_applying_for }}
**Previous School:** {{ $app->previous_school ?: '—' }}
@endcomponent

**Guardian:** {{ $app->guardian_name }}
**Phone:** {{ $app->guardian_phone }}
**Email:** {{ $app->guardian_email ?: '—' }}
**Address:** {{ $app->address ?: '—' }}

@isset($app->id)
@component('mail::button', ['url' => route('admin.applications.show', $app->id)])
Open in Admin
@endcomponent
@endisset

Thanks,
**HAFE School Website**
@endcomponent
