import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { useForm } from '@inertiajs/react';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import TextInput from '@/Components/TextInput';
import PrimaryButton from '@/Components/PrimaryButton';

const CreateEmployee = ({ ranks, units }) => {
  const { data, setData, post, processing, errors, reset } = useForm({
    first_name: '',
    middle_name: '',
    last_name: '',
    image: '',
    unit_id: '',
    jmbg: '',
    barcode_in: '',
    barcode_out: '',
    rank: '',
  });

  const submit = e => {
    e.preventDefault();

    post(route('employees.store'), {
      onFinish: () => route('employees.list'),
    });
  };

  return (
    <AuthenticatedLayout
      header={
        <h2 className="text-xl font-semibold leading-tight text-gray-800">
          Dodaj zaposlenog
        </h2>
      }
    >
      <div className="flex items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0">
        <div className="mt-6 w-full h-full overflow-hidden items-center bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg">
          <form onSubmit={submit}>
            <div>
              <InputLabel htmlFor="first_name" value="Ime" />

              <TextInput
                id="first_name"
                type="text"
                name="first_name"
                value={data.first_name}
                className="mt-1 block w-full"
                autoComplete="first_name"
                isFocused={true}
                onChange={e => setData('first_name', e.target.value)}
              />

              <InputError message={errors.first_name} className="mt-2" />
            </div>
            <div className="mt-4">
              <InputLabel htmlFor="middle_name" value="Srednje ime" />

              <TextInput
                id="middle_name"
                type="text"
                name="middle_name"
                value={data.middle_name}
                className="mt-1 block w-full"
                autoComplete="middle_name"
                onChange={e => setData('middle_name', e.target.value)}
              />

              <InputError message={errors.middle_name} className="mt-2" />
            </div>
            <div className="mt-4">
              <InputLabel htmlFor="last_name" value="Prezime" />

              <TextInput
                id="last_name"
                type="text"
                name="last_name"
                value={data.last_name}
                className="mt-1 block w-full"
                autoComplete="last_name"
                onChange={e => setData('last_name', e.target.value)}
              />

              <InputError message={errors.last_name} className="mt-2" />
            </div>
            <div className="mt-4">
              <InputLabel htmlFor="jmbg" value="JMBG" />

              <TextInput
                id="jmbg"
                type="text"
                name="jmbg"
                value={data.jmbg}
                className="mt-1 block w-full"
                autoComplete="jmbg"
                onChange={e => setData('jmbg', e.target.value)}
              />

              <InputError message={errors.jmbg} className="mt-2" />
            </div>
            <div className="mt-4">
              <InputLabel htmlFor="barcode_in" value="Barkod In" />

              <TextInput
                id="barcode_in"
                type="text"
                name="barcode_in"
                value={data.barcode_in}
                className="mt-1 block w-full"
                autoComplete="barcode_in"
                onChange={e => setData('barcode_in', e.target.value)}
              />

              <InputError message={errors.barcode_in} className="mt-2" />
            </div>

            <div className="mt-4">
              <InputLabel htmlFor="barcode_out" value="Barkod Out" />

              <TextInput
                id="barcode_out"
                type="text"
                name="barcode_out"
                value={data.barcode_out}
                className="mt-1 block w-full"
                autoComplete="barcode_out"
                onChange={e => setData('barcode_out', e.target.value)}
              />

              <InputError message={errors.barcode_out} className="mt-2" />
            </div>

            <div className="mt-4">
              <InputLabel htmlFor="image" value="Slika:" />

              <TextInput
                id="image"
                type="file"
                name="image"
                value={data.image}
                className="mt-1 block w-full"
                autoComplete="image"
                onChange={e => setData('image', e.target.value)}
              />

              <InputError message={errors.image} className="mt-2" />
            </div>
            <div className="mt-4">
              <div>
                <label
                  htmlFor="unit_id"
                  className="block text-sm/6 font-medium text-gray-900"
                >
                  Izaberi jedinicu
                </label>
                <div className="mt-2 grid grid-cols-1">
                  <select
                    id="unit_id"
                    name="unit_id"
                    defaultValue=""
                    onChange={e => setData('unit_id', e.target.value)}
                    className="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                  >
                    <option value="">izaberi</option>
                    {units.map(unit => (
                      <option key={unit.id} value={unit.id}>
                        {unit.name}
                      </option>
                    ))}
                  </select>
                </div>
              </div>
              <InputError message={errors.unit_id} className="mt-2" />
            </div>
            <div className="mt-4">
              <div>
                <label
                  htmlFor="rank"
                  className="block text-sm/6 font-medium text-gray-900"
                >
                  Izaberi čin
                </label>
                <div className="mt-2 grid grid-cols-1">
                  <select
                    id="rank"
                    name="rank"
                    defaultValue=""
                    onChange={e => setData('rank', e.target.value)}
                    className="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                  >
                    <option value="">izaberi</option>
                    {ranks.map(rank => (
                      <option key={rank} value={rank}>
                        {rank}
                      </option>
                    ))}
                  </select>
                </div>
              </div>
              <InputError message={errors.rank} className="mt-2" />
            </div>
            <div className="mt-4 flex items-center justify-end">
              <PrimaryButton className="ms-4" disabled={processing}>
                Dodaj zaposlenog
              </PrimaryButton>
            </div>
          </form>
        </div>
      </div>
    </AuthenticatedLayout>
  );
};

export default CreateEmployee;
