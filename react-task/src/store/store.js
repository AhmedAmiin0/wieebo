import { configureStore } from '@reduxjs/toolkit';
import usersReducer from '../pages/users/userSlice';

export const store = configureStore({
  reducer: {
    users: usersReducer,
  },
});
