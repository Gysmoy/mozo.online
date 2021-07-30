function runFunction(func, data) {
    switch (func) {
        case 'getGeneralData':
            getGeneralData(data);
            break;
        case 'getBasicConfig':
            getBasicConfig(data);
            break;
        default:
            break;
    }
}