var config = {};

function setConfig() {
    console.log(config);
    $('title').text(config.general.pageName);
    $('#logo').attr('alt', config.general.pageName);
    var root = '';
    root += `--background: ${config.general.background};`;
    root += `--logo: ${config.general.logo};`;
    root += `--font: ${config.general.font};`;
    for (const key1 in config.especific) {
        const especific = config.especific[key1];
        for (const key2 in especific) {
            const value = especific[key2];
            if (typeof value == 'object') {
                for (const key3 in value) {
                    root += `--${key2}-${key3}: ${value[key3]};`;
                }
            } else {
                root += `--${key1}-${key2}: ${value};`;
            }
        }
    }
    $('#config').html(`:root {${root}}`);
}