import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';
import React from 'react';

export default function List({ employees, addEmployeeRoute }) {
  return (
    <AuthenticatedLayout>
      <Head title="Employee List" />
      <div className="px-4 sm:px-6 lg:px-8 mt-6">
        <div className="sm:flex sm:items-center">
          <div className="sm:flex-auto">
            <h2 className="text-xl font-semibold leading-tight text-gray-800">
              Employee List
            </h2>
          </div>
          <div className="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <button
              type="button"
              className="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >
              <Link href={addEmployeeRoute}>Add Employee</Link>
            </button>
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
                      Name
                    </th>
                    <th
                      scope="col"
                      className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                    >
                      Unit
                    </th>
                    <th
                      scope="col"
                      className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                    >
                      Jmbg
                    </th>
                    <th
                      scope="col"
                      className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                    >
                      Barcodes
                    </th>
                    <th
                      scope="col"
                      className="relative py-3.5 pl-3 pr-4 sm:pr-3"
                    >
                      <span className="sr-only">Edit</span>
                    </th>
                  </tr>
                </thead>
                <tbody className="bg-white">
                  {employees.map(employee => (
                    <tr key={employee.id} className="even:bg-gray-50">
                      <td className="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                        <div className="flex items-center">
                          <div className="size-11 shrink-0">
                            <img
                              alt=""
                              src={employee.image}
                              className="size-11 rounded-full"
                            />
                          </div>
                          <div className="ml-4">
                            <div className="mt-1 text-gray-500">
                              {employee.rank}
                            </div>
                            <div className="font-medium text-gray-900">
                              {employee.last_name}, {employee.middle_name}{' '}
                              {employee.first_name}
                            </div>
                          </div>
                        </div>
                      </td>
                      <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        {employee.unit}
                      </td>
                      <td className="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        {employee.jmbg}
                      </td>
                      <td className="px-3 py-4 text-sm text-gray-500">
                        {employee.employeeBarcodes?.map(barcode => (
                          <p
                            key={barcode.id}
                            className="items-center px-2.5 py-0.5 rounded-md text-xs font-medium mt-1 text-gray-800"
                          >
                            {barcode.code} - {barcode.type}
                          </p>
                        ))}
                      </td>
                      <td className="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-3">
                        <a
                          href="#"
                          className="text-indigo-600 hover:text-indigo-900"
                        >
                          Edit
                          <span className="sr-only">
                            , {employee.first_name}
                          </span>
                        </a>
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
