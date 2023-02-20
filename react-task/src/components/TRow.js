import React from "react";

function TBody({ name, email, age, gender, country }) {
  return (
    <tr>
      <td className="px-4 py-4 text-sm text-gray-500  whitespace-nowrap">
        <div className="flex items-center gap-x-2">
          <img
            className="object-cover w-8 h-8 rounded-full"
            src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
            alt=""
          />
          <div>
            <h2 className="text-sm font-medium text-gray-800  ">{name}</h2>
            <p className="text-xs font-normal text-gray-600 ">{email}</p>
          </div>
        </div>
      </td>
      <td className="px-12 py-4 text-sm font-medium whitespace-nowrap">
        <div>
          <h4 className="text-gray-700 ">{age}</h4>
        </div>
      </td>
      <td className=" py-4 text-sm whitespace-nowrap">
        <div>
          <h4 className="text-gray-700 ">{gender}</h4>
        </div>
      </td>
      <td className=" py-4 text-sm whitespace-nowrap">
        <div className="flex items-center">{country}</div>
      </td>

      <td className=" py-4 text-sm whitespace-nowrap">
        <div className="flex items-center gap-x-3">
          <button className="text-indigo-500 hover:text-indigo-700">
            Edit
          </button>
        </div>
      </td>
    </tr>
  );
}

export default TBody;
