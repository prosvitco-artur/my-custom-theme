import React, { useState } from 'react';
import ReactDOM from 'react-dom';
import Form from 'react-bootstrap/Form';
import Button from 'react-bootstrap/Button';
import Tabs from 'react-bootstrap/Tabs';
import Tab from 'react-bootstrap/Tab';

import FormFields from './header-footer/FormFields';

function SettingsSection({ title, data, onDataChange }) {
    const [settings, setSettings] = useState(data);

    const handleChange = (index, key, value) => {
        const newSettings = [...settings];
        newSettings[index][key] = value;
        setSettings(newSettings);
        onDataChange(newSettings);
    };

    const handleAddField = () => {
        setSettings([...settings, { code: '', priority: 10 }]);
    };

    const handleRemoveField = (index) => {
        const newSettings = [...settings];
        newSettings.splice(index, 1);
        setSettings(newSettings);
        onDataChange(newSettings);
    }

    return (
        <div>
            <h2>{title}</h2>
            <Form>
                {settings.map((setting, index) => (
                    <FormFields key={index} index={index} setting={setting} handleChange={handleChange} handleRemoveField={handleRemoveField} title={title} />
                ))}
                <Button className='mt-2' variant="primary" onClick={handleAddField}>Add {title} Field</Button>
            </Form>
        </div>
    );
}

function App() {
    let wpNonceToken = token?.nonce;
    if (!wpNonceToken) return null;

    let defaultSettings = { code: '', priority: 10 };

    let settings = {
        header: Array.isArray(wpData?.headerSettings) ? wpData.headerSettings : [defaultSettings],
        body: Array.isArray(wpData?.bodySettings) ? wpData.bodySettings : [defaultSettings],
        footer: Array.isArray(wpData?.footerSettings) ? wpData.footerSettings : [defaultSettings]
    };
    

    const handleSettingsChange = (type, newSettings) => {
        settings[type] = newSettings;
    };

    const submitData = () => {
        fetch(ajaxurl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                action: 'save_header_footer_settings',
                nonce: wpNonceToken,
                headerSettings: JSON.stringify(settings.header),
                bodySettings: JSON.stringify(settings.body),
                footerSettings: JSON.stringify(settings.footer)
            })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Settings saved successfully');
                } else {
                    alert('Failed to save settings');
                }
            });
    };

    return (
        <div>
            <h2>Settings</h2>
            <Tabs defaultActiveKey="header" id="settings-tabs">
                <Tab eventKey="header" title="Header">
                    <SettingsSection title="Header" data={settings.header} onDataChange={(newSettings) => handleSettingsChange('header', newSettings)} />
                </Tab>
                <Tab eventKey="body" title="Body">
                    <SettingsSection title="Body" data={settings.body} onDataChange={(newSettings) => handleSettingsChange('body', newSettings)} />
                </Tab>
                <Tab eventKey="footer" title="Footer">
                    <SettingsSection title="Footer" data={settings.footer} onDataChange={(newSettings) => handleSettingsChange('footer', newSettings)} />
                </Tab>
            </Tabs>

            <Button variant="primary" className='mt-2' onClick={submitData}>Save</Button>
        </div>
    );
}


ReactDOM.render(
    <App />,
    document.getElementById('react-root')
);
