import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import useRecaptcha from '@/hooks/useRecaptcha';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head, Link, useForm, usePage } from '@inertiajs/react';
import ReCAPTCHA from 'react-google-recaptcha';

export default function Register() {
  const recaptchaData = usePage().props.recaptcha;
  const { capchaToken, recaptchaRef, handleRecaptcha } = useRecaptcha();
  const { data, setData, post, processing, errors, reset } = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    capcha_token: '',
  });

  const submit = e => {
    e.preventDefault();

    if (!data.capcha_token) {
      alert('Molimo vas da potvrdite da niste robot');
      return;
    }

    post(route('register'), {
      onFinish: () => reset('password', 'password_confirmation'),
    });
  };

  return (
    <GuestLayout>
      <Head title="Register" />

      <form onSubmit={submit}>
        <div>
          <InputLabel htmlFor="name" value="Ime" />

          <TextInput
            id="name"
            name="name"
            value={data.name}
            className="mt-1 block w-full"
            autoComplete="name"
            autoFocus={true}
            isFocused={true}
            onChange={e => {
              setData('name', e.target.value);
            }}
            required
          />

          <InputError message={errors.name} className="mt-2" />
        </div>

        <div className="mt-4">
          <InputLabel htmlFor="email" value="Email" />

          <TextInput
            id="email"
            type="email"
            name="email"
            value={data.email}
            className="mt-1 block w-full"
            autoComplete="username"
            onChange={e => setData('email', e.target.value)}
            required
          />

          <InputError message={errors.email} className="mt-2" />
        </div>

        <div className="mt-4">
          <InputLabel htmlFor="password" value="Šifra" />

          <TextInput
            id="password"
            type="password"
            name="password"
            value={data.password}
            className="mt-1 block w-full"
            autoComplete="new-password"
            onChange={e => setData('password', e.target.value)}
            required
          />

          <InputError message={errors.password} className="mt-2" />
        </div>

        <div className="mt-4">
          <InputLabel htmlFor="password_confirmation" value="Potvrdi šifru" />

          <TextInput
            id="password_confirmation"
            type="password"
            name="password_confirmation"
            value={data.password_confirmation}
            className="mt-1 block w-full"
            autoComplete="new-password"
            onChange={e => setData('password_confirmation', e.target.value)}
            required
          />

          <InputError message={errors.password_confirmation} className="mt-2" />
        </div>
        <div className="mt-4 flex items-center w-full">
          <ReCAPTCHA
            ref={recaptchaRef}
            sitekey={recaptchaData.site_key}
            onChange={token => {
              setData('capcha_token', token);
              handleRecaptcha(token);
            }}
          />
        </div>

        <div className="mt-4 flex items-center justify-end ">
          <Link
            href={route('login')}
            className="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
          >
            Već ste registrovani?
          </Link>

          <PrimaryButton className="ms-4" disabled={processing || !capchaToken}>
            Registruj se
          </PrimaryButton>
        </div>
      </form>
    </GuestLayout>
  );
}
