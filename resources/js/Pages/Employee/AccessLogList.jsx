import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import React from 'react';

export default function AccessLogList({ employee, logs }) {
  return (
    <AuthenticatedLayout>
      <Head title="Employee List" />
      <div className="px-4 sm:px-6 lg:px-8 mt-6">
        <div className="sm:flex sm:items-center">
          <div className="sm:flex-auto">
            <h1 className="text-2xl font-semibold leading-tight text-gray-800 text-center">
              Logovi pristupa
            </h1>
            <div className="flex items-center mt-8">
              <div className="size-16 shrink-0">
                <img
                  alt=""
                  src={employee.image}
                  className="size-16 rounded-full"
                />
              </div>
              <div className="ml-4">
                <div className="mt-1 text-gray-500">{employee.rank}</div>
                <div className="font-xl text-gray-900">{employee.name}</div>
              </div>
            </div>
          </div>
        </div>
        <div className="mt-8 flow-root bg-white shadow sm:rounded-lg">
          <div className="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div className="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
              <table className="min-w-full divide-y divide-gray-300">
                <thead>
                  <tr>
                    <th
                      scope="col"
                      className="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3"
                    >
                      Lokacija
                    </th>
                    <th
                      scope="col"
                      className="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3"
                    >
                      Tip loga (ulaz/izlaz)
                    </th>
                    <th
                      scope="col"
                      className="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3"
                    >
                      Vreme
                    </th>
                  </tr>
                </thead>
                <tbody className="bg-white">
                  {logs.map(log => (
                    <tr key={employee.id} className="even:bg-gray-50">
                      <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        {log.barrack_name} - {log.gate_name}
                      </td>
                      <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        {log.barcode_type === 'in' ? 'Ulaz' : 'Izlaz'}
                      </td>
                      <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        {log.created_at}
                      </td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
