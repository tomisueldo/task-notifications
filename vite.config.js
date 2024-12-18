import path from "path";
import { sentryVitePlugin } from "@sentry/vite-plugin";
/* eslint-disable import/no-extraneous-dependencies */
import react from "@vitejs/plugin-react";
import laravel from "laravel-vite-plugin";
import { defineConfig, loadEnv } from "vite";
import checker from "vite-plugin-checker";

export default ({ mode }) => {
  process.env = {...process.env, ...loadEnv(mode, process.cwd())};

  const config = {
    plugins: [
      laravel({
        input: ["resources/css/app.css", "resources/js/App.tsx"],
        refresh: true,
      }),
      react(),
      checker({ typescript: true }),
      {
        handleHotUpdate({ file, server }) {
          if (file.endsWith(".blade.php")) {
            server.ws.send({ path: "*", type: "full-reload" });
          }
        },
        name: "blade",
      },
    ],
    build: {
      sourcemap: true,
    },
    resolve: {
      alias: [
        {
          find: "~/assets",
          replacement: path.resolve(__dirname, "./resources/js/shared/assets"),
        },
        {
          find: "~/components",
          replacement: path.resolve(__dirname, "./resources/js/shared/components/ui"),
        },
        {
          find: "~/hooks",
          replacement: path.resolve(__dirname, "./resources/js/shared/hooks"),
        },
        {
          find: "~/icons",
          replacement: path.resolve(__dirname, "./resources/js/shared/components/icons"),
        },
        {
          find: "~/sections",
          replacement: path.resolve(__dirname, "./resources/js/shared/sections"),
        },
        {
          find: "~/utils",
          replacement: path.resolve(__dirname, "./resources/js/shared/utils"),
        },
        { find: "~", replacement: path.resolve(__dirname, "./resources/js") },
      ],
    },
  };

  const env = process.env;

  if (env) {
    const sentryAuthToken = env.VITE_SENTRY_AUTH_TOKEN;
    const sentryOrg = env.VITE_SENTRY_ORGANIZATION;
    const sentryProject = env.VITE_SENTRY_PROJECT;

    if (sentryAuthToken && sentryOrg && sentryProject) {
      config.plugins.push(sentryVitePlugin({
        authToken: sentryAuthToken,
        org: sentryOrg,
        project: sentryProject,
      }));
    }
  }

  return defineConfig(config);
}
