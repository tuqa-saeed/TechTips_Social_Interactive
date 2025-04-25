import React, { useEffect } from 'react';

const Test = () => {
  useEffect(() => {
    fetch('http://127.0.0.1:8000/api/test')
      .then(res => res.json())
      .then(data => console.log(data))
      .catch(err => console.error('Error:', err));
  }, []);

  return (
    <div>
      <h1>Test Component</h1>
    </div>
  );
};

export default Test;
