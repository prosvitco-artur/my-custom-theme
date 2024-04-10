import React from 'react';
import Form from 'react-bootstrap/Form';


const FormField = ({ index, setting, handleChange, title, handleRemoveField }) => {


    return (
        <div className="row mt-3">
            <Form.Group controlId={`${title.toLowerCase()}-${index}-code`} className="col-8">
                <Form.Label>{title} {index + 1} Code</Form.Label>
                <Form.Control
                    as="textarea"
                    placeholder={`Enter ${title.toLowerCase()} code here`}
                    style={{ height: '100px' }}
                    value={setting.code}
                    onChange={(e) => handleChange(index, 'code', e.target.value)}
                />
            </Form.Group>
            <Form.Group controlId={`${title.toLowerCase()}-${index}-priority`} className="col-3">
                <Form.Label>{title} {index + 1} Priority</Form.Label>
                <Form.Control
                    type="number"
                    placeholder={`Enter ${title.toLowerCase()} priority`}
                    value={setting.priority}
                    onChange={(e) => handleChange(index, 'priority', parseInt(e.target.value))}
                />
            </Form.Group>
            
            <a class="link-danger col-1" href="#" onClick={() => handleRemoveField(index)} >Remove</a>
            
        </div>
    );
}

export default FormField;