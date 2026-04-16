# Maison Merch — Website Repository

> WordPress theme version-controlled with automated CI/CD deployment to GoDaddy.

## How It Works

```
Claude edits theme files → pushes branch → opens PR
        ↓
You review the diff on GitHub → Approve & Merge
        ↓
GitHub Actions auto-deploys changed files to GoDaddy via FTP
        ↓
maisonmerch.ca is live ✅
```

## Repository Structure

```
maisonmerch-website/
├── .github/
│   └── workflows/
│       ├── deploy.yml                  # Auto-deploys on merge to main
│       ├── pr-checks.yml               # Runs on every PR (PHP/CSS validation)
│       └── sync-theme-from-godaddy.yml # One-time setup: pulls live theme in
├── theme/                              # Active WordPress theme files live here
│   ├── style.css
│   ├── functions.php
│   ├── header.php
│   ├── footer.php
│   └── ...
├── scripts/                            # Utility scripts
└── README.md
```

## Required GitHub Secrets

Set these in **Settings → Secrets and variables → Actions**:

| Secret | Value |
|--------|-------|
| `FTP_SERVER` | `ftp.maisonmerch.ca` |
| `FTP_USERNAME` | FTP username from GoDaddy |
| `FTP_PASSWORD` | FTP password from GoDaddy |
| `FTP_PORT` | `21` |
| `FTP_THEME_PATH` | `/public_html/wp-content/themes/your-theme-name/` |
| `GH_PAT` | GitHub Personal Access Token (for the sync workflow) |

## Branch Strategy

| Branch | Purpose |
|--------|---------|
| `main` | Production — protected, requires PR approval |
| `fix/*` | Bug fixes (e.g. `fix/hero-render-bug`) |
| `feature/*` | New features (e.g. `feature/mobile-nav`) |
| `content/*` | Copy/content changes (e.g. `content/update-pricing`) |

## Workflows

### Deploy (`deploy.yml`)
Triggers automatically when a PR is merged to `main`. Uploads only changed files to GoDaddy.

### PR Checks (`pr-checks.yml`)
Runs on every PR. Validates PHP syntax and lists changed files so you can see exactly what's changing before approving.

### Sync from GoDaddy (`sync-theme-from-godaddy.yml`)
Run manually once to pull the current live theme into this repo. After that, this repo becomes the source of truth.

## Making Changes

Claude will:
1. Create a branch (e.g. `fix/hero-render-bug`)
2. Edit the relevant theme files
3. Open a PR with a clear description of what changed and why
4. You review, approve, and merge

The deploy happens automatically within ~60 seconds of merging.
