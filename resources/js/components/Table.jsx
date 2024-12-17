import React from 'react';
import ReactDOM from 'react-dom/client';

function Table() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Component React Js</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Table;

if (document.getElementById('table-status-reactjs')) {
    const Index = ReactDOM.createRoot(document.getElementById("table-status-reactjs"));

    Index.render(
        <React.StrictMode>
            <Table/>
        </React.StrictMode>
    )
}
