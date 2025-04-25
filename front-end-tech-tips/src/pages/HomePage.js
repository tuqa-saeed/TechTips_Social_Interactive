import React, { useEffect, useState } from 'react';

const HomePage = () => {
    const [advices, setAdvices] = useState([]);

    useEffect(() => {
        fetch('http://localhost:8000/api/advices')
            .then((response) => response.json())
            .then((data) => setAdvices(data));
    }, []);

    return (
        <div>
            <h1>Tips</h1>
            <div className="advices-list">
                {advices.map((advice) => (
                    <div key={advice.id} className="advice-item">
                        <h2>{advice.title}</h2>
                        <p>{advice.content}</p>
                        <button onClick={() => window.location.href = `/advice/${advice.id}`}>More Detailes </button>
                    </div>
                ))}
            </div>
        </div>
    );
};

export default HomePage;
