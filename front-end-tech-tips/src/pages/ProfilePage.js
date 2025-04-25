import React, { useEffect, useState } from 'react';

const ProfilePage = () => {
    const [user, setUser] = useState({});
    const [newName, setNewName] = useState('');
    const [newProfilePicture, setNewProfilePicture] = useState('');

    useEffect(() => {
        fetch('http://localhost:8000/api/profile', {
            headers: {
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
            },
        })
            .then((response) => response.json())
            .then((data) => {
                setUser(data);
                setNewName(data.name);
                setNewProfilePicture(data.profile_picture);
            });
    }, []);

    const handleUpdate = () => {
        fetch('http://localhost:8000/api/profile', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${localStorage.getItem('token')}`,
            },
            body: JSON.stringify({
                name: newName,
                profile_picture: newProfilePicture,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                setUser(data);
            });
    };

    return (
        <div>
            <h1>Profile</h1>
            <p>Name: {user.name}</p>
            <p>E-mail: {user.email}</p>
            <p>Profile Picture: {user.profile_picture}</p>
            <input
                type="text"
                value={newName}
                onChange={(e) => setNewName(e.target.value)}
                placeholder=" Update Name"
            />
            <input
                type="text"
                value={newProfilePicture}
                onChange={(e) => setNewProfilePicture(e.target.value)}
                placeholder="Update Profile Picture  "
            />
            <button onClick={handleUpdate}>Update Profile   </button>
        </div>
    );
};

export default ProfilePage;
