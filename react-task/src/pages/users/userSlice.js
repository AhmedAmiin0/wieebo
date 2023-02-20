import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import { fetchUsers } from "./usersAPI";

const initialState = {
  value: [],
  status: "idle",
};

export const recordsThunk = createAsyncThunk(
  "counter/fetchRecords",
  async () => await fetchUsers()
);

export const usersSlice = createSlice({
  name: "users",
  initialState,

  extraReducers: (builder) => {
    builder
      .addCase(recordsThunk.pending, (state) => {
        state.status = "loading";
      })
      .addCase(recordsThunk.fulfilled, (state, action) => {
        state.status = "idle";
        state.value = action.payload.map((user) => {
          if (state.value.includes(user)) return;
          return user;
        });
        state.value = state.value.sort((a, b) => a.name.localeCompare(b.name));
      });
  },
});

export default usersSlice.reducer;
