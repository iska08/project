const { defineConfig } = require("cypress");

module.exports = defineConfig({
  projectId: '6irhus',
  e2e: {
    video: false,
    viewportHeight: 720,
    viewportWidth: 720,
    setupNodeEvents(on, config) {
      // implement node event listeners here
    },
  },
});
