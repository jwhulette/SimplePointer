module.exports = {
    future: {
        removeDeprecatedGapUtilities: true,
        purgeLayersByDefault: true
    },
    purge: {
        content:
            ["./resources/**/*.php", "./resources/**/*.vue"]
    },
    theme: {
        theme: {},
        extend: {}
    },
    variants: {},
    plugins: []
};
