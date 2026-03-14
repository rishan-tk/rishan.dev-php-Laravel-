# Discord Music Bot

**Stack:** Python, discord.py, yt-dlp, FFmpeg

An automated Discord bot providing music playback, queue management, and utility commands for server members.

## Features

- Stream audio from YouTube directly into voice channels
- Queue system: add, skip, pause, resume, shuffle
- Search by song name or paste a URL
- Volume control and loop mode
- Slash command support

## Technical Notes

Built using `discord.py` with async/await throughout. Audio is streamed via `yt-dlp` + `FFmpeg` — no local file storage needed.

## Status

Personal use, running on a home server. Source code available on request.
