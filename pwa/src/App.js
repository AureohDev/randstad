import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';
import  { BrowserRouter,
Routes,
Route,
} from "react-router-dom";


import Home from './screens/Home';
import CompoNavbar from './components/CompoNavbar';
import Improvments from './screens/Improvments';
import Offers from './screens/Offers';
import ApplicationSent from './screens/ApplicationSent';
import BGAqua from './components/BGAqua';

function App() {
  return (
  <BrowserRouter>
      <Routes>
        <Route path="/" element={[< Home />,<CompoNavbar />]} />
        <Route path="/home" element={[< Home />,<CompoNavbar />]} />
        <Route path="/improvments" element={[< Improvments />,<CompoNavbar />]} />
        <Route path="/offers" element={[< Offers />,<CompoNavbar />]} />
        <Route path="/applications" element={[< ApplicationSent />,<CompoNavbar />]} />
      </Routes>
    </BrowserRouter>
  );
}

export default App;
