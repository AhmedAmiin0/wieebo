import React from "react";

function Table(props) {
  const { children } = props;
  return (
    <table
      className="min-w-full divide-y divide-gray-200 
rounded-t-md overflow-hidden rounded-b-md"
    >
      <thead className="bg-gray-50 ">
        <tr>
          <th
            scope="col"
            className="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 "
          >
            <button className="flex items-center gap-x-3 focus:outline-none">
              <span>Name</span>
            </button>
          </th>

          <th
            scope="col"
            className="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 "
          >
            Age
          </th>

          <th
            scope="col"
            className="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 "
          >
            Gender
          </th>

          <th
            scope="col"
            className="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 "
          >
            Country
          </th>

          <th scope="col" className="relative py-3.5 px-4">
            <span className="sr-only"></span>
          </th>
        </tr>
      </thead>
      <tbody className="bg-white divide-y divide-gray-200  ">{children}</tbody>
    </table>
  );
}

export default Table;
