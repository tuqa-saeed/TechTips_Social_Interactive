import React, { useState } from 'react';

const RegisterPage = () => {
    const [name, setName] = useState('');
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [profilePicture, setProfilePicture] = useState('');

    const handleSubmit = (e) => {
        e.preventDefault();
        fetch('http://localhost:8000/api/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ name, email, password, profile_picture: profilePicture }),
        })
            .then((response) => response.json())
            .then((data) => {
                localStorage.setItem('token', data.token);
                window.location.href = '/profile';
            });
    };

    return (
        <form onSubmit={handleSubmit}>
            <label>Name:</label>
            <input type="text" value={name} onChange={(e) => setName(e.target.value)} />
            <label>E-mail :</label>
            <input type="email" value={email} onChange={(e) => setEmail(e.target.value)} />
            <label> Password:</label>
            <input type="password" value={password} onChange={(e) => setPassword(e.target.value)} />
            <label>Profile Picture (optional):</label>
            <input type="text" value={profilePicture} onChange={(e) => setProfilePicture(e.target.value)} />
            <button type="submit">Register</button>
        </form>
    );
};

export default RegisterPage;
