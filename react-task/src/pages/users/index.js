import { useCallback, useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";
import Table from "../../components/Table";
import TRow from "../../components/TRow";
import { recordsThunk } from "./userSlice";

function ListUsers() {
  const dispatch = useDispatch();
  const users = useSelector((state) => state.users);

  useCallback(() => {
    if (users.status === "loading") return;
    dispatch(recordsThunk());
  }, [])();

  if (users.status === "loading")
    return (
      <div className="flex justify-center items-center h-screen
        text-white text-5xl
      ">
        Loading...
      </div>
    );

  return (
    <>
      <div className="bg-[#f2e3cf] h-11 flex items-center justify-center">
        List All Users
      </div>

      <Table>
        {users.value.map((user) => (
          <TRow
            key={user.id}
            age={user.phone}
            country={user.address?.city}
            email={user.email}
            gender={user.phone}
            name={user.name}
          />
        ))}
      </Table>
      <div className="p-4 flex">
        <button
          className="bg-[#c71585] p-2 rounded-md text-white hover:bg-[#c71585] hover:text-white w-full"
          onClick={() => {
            dispatch(recordsThunk());
          }}
        >
          Load More
        </button>
      </div>
    </>
  );
}

export default ListUsers;
