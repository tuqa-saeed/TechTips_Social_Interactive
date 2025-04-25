import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';import HomePage from './pages/HomePage';
import SingleAdvicePage from './pages/SingleAdvicePage';
import RegisterPage from './pages/RegisterPage';
import LoginPage from './pages/LoginPage';
import ProfilePage from './pages/ProfilePage';
import Test from './components/test';

const App = () => {
    return (
     /*  <Router>
      <Routes>
          <Route path="/" element={<HomePage />} />
          <Route path="/advice/:id" element={<SingleAdvicePage />} />
          <Route path="/register" element={<RegisterPage />} />
          <Route path="/login" element={<LoginPage />} />
          <Route path="/profile" element={<ProfilePage />} />
      </Routes>
  </Router> */
  <Test />
    );
};

export default App;
