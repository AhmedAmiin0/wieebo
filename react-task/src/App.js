import React from "react";
import "./App.css";
import ListUsers from "./pages/users";

function App() {
  return (
    <div className="py-12 bg-slate-400 h-screen">
      <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <ListUsers />
      </div>
    </div>
  );
}
export default App;
