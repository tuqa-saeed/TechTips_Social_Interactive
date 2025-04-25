import React, { useState } from 'react';

const LoginPage = () => {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');

    const handleSubmit = (e) => {
        e.preventDefault();
        fetch('http://localhost:8000/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ email, password }),
        })
            .then((response) => response.json())
            .then((data) => {
                localStorage.setItem('token', data.token); 
                window.location.href = '/profile';
            });
    };

    return (
        <form onSubmit={handleSubmit}>
            <label>E-mail :</label>
            <input type="email" value={email} onChange={(e) => setEmail(e.target.value)} />
            <label> Passwprd:</label>
            <input type="password" value={password} onChange={(e) => setPassword(e.target.value)} />
            <button type="submit">login</button>
        </form>
    );
};

export default LoginPage;
