import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { useForm } from '@inertiajs/react';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import TextInput from '@/Components/TextInput';
import PrimaryButton from '@/Components/PrimaryButton';

const CreateGate = ({ barracks }) => {
  const { data, setData, post, processing, errors, reset } = useForm({
    name: '',
    barrack_id: '',
    ip_address: '',
    phone_number: '',
  });

  const submit = e => {
    e.preventDefault();

    post(route('gates.store'), {
      onFinish: () => route('gates.create'),
    });
  };

  return (
    <AuthenticatedLayout
      header={
        <h2 className="text-xl font-semibold leading-tight text-gray-800">
          Add Gate
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
                value={data.name}
                className="mt-1 block w-full"
                autoComplete="name"
                isFocused={true}
                onChange={e => setData('name', e.target.value)}
              />

              <InputError message={errors.name} className="mt-2" />
            </div>
            <div className="mt-4">
              <div>
                <label
                  htmlFor="barrack_id"
                  className="block text-sm/6 font-medium text-gray-900"
                >
                  Select barrack
                </label>
                <div className="mt-2 grid grid-cols-1">
                  <select
                    id="barrack_id"
                    name="barrack_id"
                    defaultValue=""
                    onChange={e => setData('barrack_id', e.target.value)}
                    className="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                  >
                    <option value="">Select barrack</option>
                    {barracks.map(barrack => (
                      <option key={barrack.id} value={barrack.id}>
                        {barrack.name}
                      </option>
                    ))}
                  </select>
                </div>
              </div>
              <InputError message={errors.barrack_id} className="mt-2" />
            </div>
            <div className="mt-4">
              <InputLabel htmlFor="ip_address" value="Ip Address" />

              <TextInput
                id="ip_address"
                type="text"
                name="ip_address"
                value={data.ip_address}
                className="mt-1 block w-full"
                autoComplete="ip_address"
                isFocused={true}
                onChange={e => setData('ip_address', e.target.value)}
              />

              <InputError message={errors.ip_address} className="mt-2" />
            </div>
            <div className="mt-4">
              <InputLabel htmlFor="phone_number" value="Phone number" />

              <TextInput
                id="phone_number"
                type="text"
                name="phone_number"
                value={data.phone_number}
                className="mt-1 block w-full"
                autoComplete="phone_number"
                isFocused={true}
                onChange={e => setData('phone_number', e.target.value)}
              />

              <InputError message={errors.naphone_numberme} className="mt-2" />
            </div>

            <div className="mt-4 flex items-center justify-end">
              <PrimaryButton className="ms-4" disabled={processing}>
                Add Gate
              </PrimaryButton>
            </div>
          </form>
        </div>
      </div>
    </AuthenticatedLayout>
  );
};

export default CreateGate;
