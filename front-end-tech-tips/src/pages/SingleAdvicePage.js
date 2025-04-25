import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';

const SingleAdvicePage = () => {
    const { id } = useParams();
    const [advice, setAdvice] = useState({});
    const [comments, setComments] = useState([]);
    const [newComment, setNewComment] = useState('');

    useEffect(() => {
        fetch(`http://localhost:8000/api/advices/${id}`)
            .then((response) => response.json())
            .then((data) => {
                setAdvice(data);
                setComments(data.comments); 
            });
    }, [id]);

    const handleCommentSubmit = () => {
        fetch('http://localhost:8000/api/comments', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${localStorage.getItem('token')}`, // إضافة التوكن في الهيدر
            },
            body: JSON.stringify({
                advice_id: advice.id,
                content: newComment,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                setComments((prevComments) => [...prevComments, data]);
                setNewComment('');
            });
    };

    return (
        <div>
            <h1>{advice.title}</h1>
            <p>{advice.content}</p>
            <div>
                <h3>Comments</h3>
                {comments.map((comment) => (
                    <div key={comment.id}>
                        <p>{comment.content}</p>
                    </div>
                ))}
            </div>
            <textarea
                value={newComment}
                onChange={(e) => setNewComment(e.target.value)}
                placeholder="Add a comment"
            />
            <button onClick={handleCommentSubmit}> Add Comment</button>
        </div>
    );
};

export default SingleAdvicePage;
