import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { useForm } from '@inertiajs/react';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import TextInput from '@/Components/TextInput';
import PrimaryButton from '@/Components/PrimaryButton';

const UpdateEmployee = ({ employee, ranks, units }) => {
  const { data, setData, post, processing, errors, reset } = useForm({
    first_name: employee.first_name,
    middle_name: employee.middle_name,
    last_name: employee.last_name,
    image: employee.image,
    unit_id: employee.unit_id,
    jmbg: employee.jmbg,
    barcode_in: employee.barcode_in,
    barcode_out: employee.barcode_out,
    rank: employee.rank,
  });

  const submit = e => {
    e.preventDefault();

    post(route('employees.update', employee.id), {
      onFinish: () => route('employees.list'),
    });
  };

  return (
    <AuthenticatedLayout
      header={
        <h2 className="text-xl font-semibold leading-tight text-gray-800">
          Update Employee
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
              <InputLabel htmlFor="rank" value="Cin" />
              <select
                id="rank"
                name="rank"
                value={data.rank}
                onChange={e => setData('rank', e.target.value)}
                className="mt-1 block w-full"
              >
                {ranks.map(rank => (
                  <option key={rank} value={rank}>
                    {rank}
                  </option>
                ))}
              </select>
              <InputError message={errors.rank} className="mt-2" />
            </div>
            <div className="mt-4">
              <InputLabel htmlFor="unit_id" value="Jedinica" />
              <select
                id="unit_id"
                name="unit_id"
                value={data.unit_id}
                onChange={e => setData('unit_id', e.target.value)}
                className="mt-1 block w-full"
              >
                {units.map(unit => (
                  <option key={unit.id} value={unit.id}>
                    {unit.name}
                  </option>
                ))}
              </select>
              <InputError message={errors.unit_id} className="mt-2" />
            </div>
            {/* <div className="mt-4">
              <InputLabel htmlFor="image" value="Image" />
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
            </div> */}
            <div className="mt-4 flex items-center justify-end">
              <PrimaryButton className="ms-4" disabled={processing}>
                Potvrdi
              </PrimaryButton>
            </div>
          </form>
        </div>
      </div>
    </AuthenticatedLayout>
  );
};

export default UpdateEmployee;
