import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { useForm } from '@inertiajs/react';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import TextInput from '@/Components/TextInput';
import PrimaryButton from '@/Components/PrimaryButton';

const CreateBarrack = () => {
  const { data, setData, post, processing, errors, reset } = useForm({
    name: '',
    address: '',
    postal_code: '',
    city: '',
    phone_number: '',
  });

  const submit = e => {
    e.preventDefault();

    post(route('barracks.store'), {
      onFinish: () => route('barracks.list'),
    });
  };

  return (
    <AuthenticatedLayout
      header={
        <h2 className="text-xl font-semibold leading-tight text-gray-800">
          Add Barrack
        </h2>
      }
    >
      <div className="flex items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0">
        <div className="mt-6 w-full h-full overflow-hidden items-center bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg">
          <form onSubmit={submit}>
            <div>
              <InputLabel htmlFor="name" value="Name" />

              <TextInput
                id="name"
                type="text"
                name="name"
                value={data.first_name}
                className="mt-1 block w-full"
                autoComplete="name"
                isFocused={true}
                onChange={e => setData('name', e.target.value)}
              />

              <InputError message={errors.name} className="mt-2" />
            </div>

            <div className="mt-4">
              <InputLabel htmlFor="address" value="Address" />

              <TextInput
                id="address"
                type="text"
                name="address"
                value={data.address}
                className="mt-1 block w-full"
                autoComplete="address"
                onChange={e => setData('address', e.target.value)}
              />

              <InputError message={errors.address} className="mt-2" />
            </div>

            <div className="mt-4">
              <InputLabel htmlFor="postal_code" value="Postal Code" />

              <TextInput
                id="postal_code"
                type="text"
                name="postal_code"
                value={data.postal_code}
                className="mt-1 block w-full"
                autoComplete="postal_code"
                onChange={e => setData('postal_code', e.target.value)}
              />

              <InputError message={errors.postal_code} className="mt-2" />
            </div>

            <div className="mt-4">
              <InputLabel htmlFor="city" value="City" />

              <TextInput
                id="city"
                type="text"
                name="city"
                value={data.city}
                className="mt-1 block w-full"
                autoComplete="city"
                onChange={e => setData('city', e.target.value)}
              />

              <InputError message={errors.city} className="mt-2" />
            </div>

            <div className="mt-4">
              <InputLabel htmlFor="phone_number" value="Phone Number" />

              <TextInput
                id="phone_number"
                type="text"
                name="phone_number"
                value={data.phone_number}
                className="mt-1 block w-full"
                autoComplete="phone_number"
                onChange={e => setData('phone_number', e.target.value)}
              />

              <InputError message={errors.phone_number} className="mt-2" />
            </div>

            <div className="mt-4 flex items-center justify-end">
              <PrimaryButton className="ms-4" disabled={processing}>
                Add Barrack
              </PrimaryButton>
            </div>
          </form>
        </div>
      </div>
    </AuthenticatedLayout>
  );
};

export default CreateBarrack;
