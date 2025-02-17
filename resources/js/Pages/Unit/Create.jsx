import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { useForm } from '@inertiajs/react';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import TextInput from '@/Components/TextInput';
import PrimaryButton from '@/Components/PrimaryButton';

const CreateUnit = () => {
  const { data, setData, post, processing, errors, reset } = useForm({
    name: '',
  });

  const submit = e => {
    e.preventDefault();

    post(route('units.store'), {
      onFinish: () => route('units.list'),
    });
  };

  return (
    <AuthenticatedLayout
      header={
        <h2 className="text-xl font-semibold leading-tight text-gray-800">
          Dodaj jedinicu
        </h2>
      }
    >
      <div className="flex items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0">
        <div className="mt-6 w-full h-full overflow-hidden items-center bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg">
          <form onSubmit={submit}>
            <div>
              <InputLabel htmlFor="name" value="Naziv" />

              <TextInput
                id="name"
                type="text"
                name="name"
                value={data.name}
                className="mt-1 block w-full"
                autoComplete="name"
                isFocused={true}
                onChange={e => setData('name', e.target.value)}
              />

              <InputError message={errors.name} className="mt-2" />
            </div>

            <div className="mt-4 flex items-center justify-end">
              <PrimaryButton className="ms-4" disabled={processing}>
                Dodaj jedinicu
              </PrimaryButton>
            </div>
          </form>
        </div>
      </div>
    </AuthenticatedLayout>
  );
};

export default CreateUnit;
